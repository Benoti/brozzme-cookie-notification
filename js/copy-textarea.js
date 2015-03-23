/**
 * Created by admin on 12/03/15.
 */
jQuery(function($){

    $("select[name='random_message']").selectric();
    $('.customOptions').selectric({
        optionsItemBuilder: function(itemData, element, index){
            return element.val().length ? '<span class="ico ico-' + element.val() + '"></span>' + itemData.text : itemData.text;
        }
    });

   $("select[name='random_message']").on('change', function() {
       $("textarea[id='bcn_notification_text']").val($(this).val() );
   });
    $("select[name='random_policyButton']").selectric();
    $('.customOptions').selectric({
        optionsItemBuilder: function(itemData, element, index){
            return element.val().length ? '<span class="ico ico-' + element.val() + '"></span>' + itemData.text : itemData.text;
        }
    });
    $("select[name='random_policyButton']").on('change', function() {
        $("input[id='bcn_policyButton_text']").val($(this).val() );
    });

    $("select[name='random_acceptText']").selectric();
    $('.customOptions').selectric({
        optionsItemBuilder: function(itemData, element, index){
            return element.val().length ? '<span class="ico ico-' + element.val() + '"></span>' + itemData.text : itemData.text;
        }
    });
    $("select[name='random_acceptText']").on('change', function() {
        $("input[id='bcn_acceptText']").val($(this).val() );
    });

    $("select[name='random_declineText']").selectric();
    $('.customOptions').selectric({
        optionsItemBuilder: function(itemData, element, index){
            return element.val().length ? '<span class="ico ico-' + element.val() + '"></span>' + itemData.text : itemData.text;
        }
    });
    $("select[name='random_declineText']").on('change', function() {
        $("input[id='bcn_declineText']").val($(this).val() );
    });

});

