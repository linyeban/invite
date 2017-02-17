function makisu(){
	if ( $.fn.makisu.enabled ) {
        var $sashimi = $( '.sashimi' );

        $sashimi.makisu({
            selector: 'dd',
            overlap: 0.2,
            speed: 0.5
        });

        // Open all			            
        $( '.list' ).makisu( 'toggle' );

        // Toggle on click
        $( '.toggle' ).on( 'click', function() {
            $( '.list' ).makisu( 'toggle' );
        });

        // Disable links
        $( '.toggle' ).click( function( event ) {
            event.preventDefault();
        });
    }
}
$(document).ready(function(){
	makisu();
	$("#apply").click(function(){
		alert("请直接投简历到联系人邮箱");
	});
});