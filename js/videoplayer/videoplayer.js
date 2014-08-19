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
        parent = $videoPlayer.parent()[0].id,
        playlist = [{
          image: poster,
          provider: "//mediapm.edgesuite.net/jw/support_player/v6/swf/AkamaiAdvancedJWStreamProvider.swf",
          type:'mp4'
          }],
        skins = {
          bon: '/live/wp-content/themes/bon/libs/jwplayer/skins/bon/bon.xml',
          plain: 'Five',
          bekle: 'bekle'
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

    if($videoPlayer.data().videotype === 'stream' ) { //Stream
      // var hls = sources.eq( Utils.searchArray(sources, 'm3u8')).attr('src'),
      //     hds = sources.eq( Utils.searchArray(sources, 'f4m')).attr('src');
      var hls = sources.eq( $.inArray('m3u8', sources) ).attr('src'),
          hds = sources.eq( $.inArray('f4m', sources) ).attr('src');
      playlist[0].file = (iOS? hls : hds );
    } else { // VOD
      playlist[0].sources = [];
      for (var i = sources.length - 1; i >= 0; i--) {
        playlist[0].sources.push({file: sources.eq(i).attr('src')});
      }
    }

    // Initiate JW Player
    this.player = new jwplayer(parent).setup({
      playlist: playlist,
      sharing: sharing,
      height: vph,
      width: vpw,
      skin: skinToUse,
      smoothing: true,
      primary: "flash",
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
    });

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