// General Utils
Utils = {
  searchArray: function(arr, obj) {
    var res = false;
    for(var i=0; i<arr.length; i++) {
      var p = new RegExp(obj, "g");
      if ( arr[i].src.match(p) ) res = i;
    }
    return res;
  }
}

VideoPlayer = function (opt) {
 
  var that = this;
  
  this.init = function () {

    jwplayer.key = "p8K1s8dYdTbGM5fWp6TooV9auuATbVSFI1imvajRHVs=";

    var iOS = ( navigator.userAgent.match(/(iPad|iPhone|iPod)/g) ? true : false ),
        aspectRatio = 9/16,
        $videoPlayer = $(".jwplayer-video"),
        sources = $videoPlayer.find('source'),
        poster = $videoPlayer.attr('poster'),
        vpw = $videoPlayer.innerWidth(),
        vph = vpw * aspectRatio,
        autostart = $videoPlayer.data().autostart,
        parent = $videoPlayer.parent()[0].id,
        playlist = [{
          image: poster,
          provider: "http://players.edgesuite.net/flash/plugins/jw/v3.4/AkamaiAdvancedJWStreamProvider.swf",
          type:'mp4'
          }],
        skins = {
          bon: '/live/wp-content/themes/bon-foundation/js/jwplayer/skins/bon/bon.xml',
          plain: '/live/wp-content/themes/bon-foundation/js/jwplayer/skins/bonplain/bonplain.xml'
        },
        skinToUse = ( skins[$videoPlayer.data().skin]? skins[$videoPlayer.data().skin] : skins.bon );

    that.parentEl = $videoPlayer.parent().parent()[0];
    that.aspectRatio = aspectRatio;

    if($videoPlayer.data().share === 1) {
      sharing = {
        code: encodeURI("<iframe src='"+window.location.href+"' width='"+vpw+"' height='"+vph+"' frameborder='0' webkitAllowFullScreen mozallowfullscreen allowfullscreen><iframe/>"),
        link: $videoPlayer.data().permalink
      };
    } else {
      sharing = '';
    }

    //Stream
    if($videoPlayer.data().videotype === 'stream' ) {
      var hls = sources.eq( Utils.searchArray(sources, 'm3u8')).attr('src'),
          hds = sources.eq( Utils.searchArray(sources, 'f4m')).attr('src');
      playlist[0].file = (iOS? hls : hds );

    }
    // VOD
    else {
      playlist[0].sources = [];
      for (var i = sources.length - 1; i >= 0; i--) {
        playlist[0].sources.push({file: sources.eq(i).attr('src')});
      }
    }

    // Player setup
    var playerSetup = {
      playlist: playlist,
      sharing: sharing,
      height: vph,
      width: vpw,
      skin: skinToUse,
      smoothing: true,
      primary: "flash",
      autostart: autostart,
      //akamai support player configs.
      clipBegin : "",
      clipEnd : "",
      mbrStartingIndex : "",
      mbrStartingBitrate :"",
      akamaiMediaType : "",
      netsessionMode : "",
      genericNetStreamPropertyName :"",
      genericNetStreamPropertyValue : "",
      enableEndUserMapping : false,
      enableAlternateServerMapping : false
    }

    // look for countdown time and don't initiate player if not live yet
    var timetorelease = $videoPlayer.data().timetorelease,
        releasedate = $videoPlayer.data().releasedate;

    if( timetorelease ) {

      $('.jwplayer-wrapper')
        .find('video').hide().end()
        .append('<div class="counter-container"><p><span class="release-date">Stream begins on '+releasedate+'</span><span class="counter"></span></p></div>');

      var playerTimer = setInterval(function () {
        var timer = timetorelease,
            text = "";

        // do some time calculations
        days = parseInt(timer / 86400);
        if(days > 0) {
          daysLabel = (days > 1)? " days, " : " day, ";
          text += days + daysLabel;
        }
        timer = timer % 86400;

        hours = parseInt(timer / 3600);
        // Add padding
        if(hours < 10) {
          text += "0";
        }
        hoursLabel = ":"; //(hours > 1)? " hours, " : " hour, ";
        text += hours + hoursLabel;
        timer = timer % 3600;

        minutes = parseInt(timer / 60);
        // Add padding
        if(minutes < 10) {
          text += "0";
        }
        minutesLabel = ":"; //(minutes > 1)? " minutes, " : " minute, ";
        text += minutes + minutesLabel;
        

        seconds = parseInt(timer % 60);
        // Add padding
        if(seconds < 10) {
          text += "0";
        }
        secondsLabel = " left"; //(seconds > 1)? " seconds left" : " second left";
        text += seconds + secondsLabel;

        // format countdown string + set tag value
        $(".counter").text( text );

        timetorelease--;

        // Countdown is over, clear countdown and start player
        if(timetorelease < 1) {
          clearInterval(playerTimer);
          $('.counter-container').hide();
          this.player = new jwplayer(parent).setup(playerSetup);
        }

      }, 1000);
    }
    // no time to release, good to go
    else {
      // Initiate JW Player
      this.player = new jwplayer(parent).setup(playerSetup);
    }

    // Resize handler
    if(opt && opt.embed) {
     that.resizeVideo();
     window.onresize = that.resizeVideo;
    }

  };
  
  this.resizeVideo = function(){
    var width = that.parentEl.offsetWidth;
    jwplayer().resize(width,width * that.aspectRatio);
  };

  this.init();
};