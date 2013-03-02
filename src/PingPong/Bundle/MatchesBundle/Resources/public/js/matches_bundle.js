$(function() {

//  Dig out the form and add two new rows
    var collection = $('#pingpong_bundle_matchbundle_matchtype_results');
    var index = 1;
    var player1 = $(collection).data('prototype').replace(/__name__/g, index);
    var player2 = $(collection).data('prototype').replace(/__name__/g, index+1);

    if ($('#pingpong_bundle_matchbundle_matchtype_results > div').length == 0) {
        $(collection).append(player1).append(player2);
    }


//  Update the number of players on match type change
    $('#pingpong_bundle_matchbundle_matchtype_matchType').change(function() {
       if ($(this).val() == 1) {

       } else {
           alert('TODO: Fix this');
       }
    });

});