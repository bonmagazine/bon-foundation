(function() {
  (function(root, factory) {
    if (typeof define === 'function' && define.amd) {
      return define(['jquery', 'waypoints'], factory);
    } else {
      return factory(root.jQuery);
    }
  })(window, function($) {
    var defaults;

    defaults = {
      container: 'auto',
      items: '.hentry',
      more: '.nav-next a',
      offset: 'bottom-in-view',
      loadingClass: 'infinite-loading',
      behavior: 'default',
      loadingText: "Loading...",
      onBeforePageLoad: $.noop,
      onAfterPageLoad: $.noop
    };
    return $.waypoints('extendFn', 'infinite', function(options) {
      var $container, opts;

      opts = $.extend({}, $.fn.waypoint.defaults, defaults, options);
      if ($(opts.more).length === 0) {
        return this;
      }
      $container = opts.container === 'auto' ? this : $(opts.container);
      $container.append('<div class="loader">'+opts.loadingText+'</div>');

      opts.handler = function(direction) {
        var $this;

        if (direction === 'down' || direction === 'right') {
          $this = $(this);
          opts.onBeforePageLoad();
          $this.waypoint('destroy');
          $container.addClass(opts.loadingClass);
          return $.get($(opts.more).attr('href'), function(data) {
            var $data, $more, $newMore, fn;

            $data = $($.parseHTML(data));
            $more = $(opts.more);
            $newElements = $data.find(opts.items);
            $newMore = $data.find(opts.more);
            if(opts.behavior !== 'masonry') {
              $container.append($newElements);
            }
            $container.removeClass(opts.loadingClass);
            if ($newMore.length) {
              $more.replaceWith($newMore);
              fn = function() {
                return $this.waypoint(opts);
              };
              setTimeout(fn, 0);
            } else {
              $more.remove();
            }
            return opts.onAfterPageLoad($newElements);
          });
        }
      };
      return this.waypoint(opts);
    });
  });

}).call(this);
