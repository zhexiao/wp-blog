$(function(){
      $('.post-wrap').waterfall({
        itemCls: 'waterfall-item',
        fitWidth: true, 
        colWidth: 400, 
        gutterWidth:20,
        isAutoPrefill:false,
        checkImagesLoaded:false,
        maxPage:1,
        loadingMsg:''
    })
})