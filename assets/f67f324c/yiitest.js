/**
 * Created by alex on 12.12.15.
 */
$(document).ready(function(){
    $('.mp:first-child').magnificPopup({
        delegate: 'td', // child items selector, by clicking on it popup will open
        type: 'image',
        gallery : {
            enabled : true
        },
        removalDelay: 300,
        mainClass: 'mfp-fade'
        // other options
    });
});