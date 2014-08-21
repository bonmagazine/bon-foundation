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
          bon: '/live/wp-content/themes/bon/libs/jwplayer/skins/bon/bon.xml',
          plain: '/live/wp-content/themes/bon/libs/jwplayer/skins/bonplain/bonplain.xml'
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
      var hls = sources.eq( Utils.searchArray(sources, 'm3u8')).attr('src'),
          hds = sources.eq( Utils.searchArray(sources, 'f4m')).attr('src');
      // var hls = sources.eq( $.inArray('m3u8', sources) ).attr('src'),
      //     hds = sources.eq( $.inArray('f4m', sources) ).attr('src');
      playlist[0].file = (iOS? hls : hds );
    } else { // VOD
      playlist[0].sources = [];
      for (var i = sources.length - 1; i >= 0; i--) {
        playlist[0].sources.push({file: sources.eq(i).attr('src')});
      }
    }

    console.log(playlist);

    // Initiate JW Player
    this.player = new jwplayer(parent).setup({
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