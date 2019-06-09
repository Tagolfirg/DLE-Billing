/**
 * DLE Billing
 *
 * @link          https://github.com/mr-Evgen/dle-billing-module
 * @author        dle-billing.ru <evgeny.tc@gmail.com>
 * @copyright     Copyright (c) 2012-2017, mr_Evgen
 */

$(function()
{
    $('.billing-donate-send').click(function()
    {
        var id = $(this).data("id");
        var balance = $(this).data("balance");
        var min = $(this).data("min");
        var max = $(this).data("max");
        var modal_title = $(this).data("langerror");

        var sum = $("#billing-donate-value-" + id).val();
        var comment = $("#billing-donate-comment-" + id).val();

        if( parseFloat( min ) > parseFloat( sum ) )
        {
            DLEalert( $(this).data("error-min"), modal_title );

			return false;
        }

        if( parseFloat( max ) && parseFloat( max ) < parseFloat( sum ) )
        {
            DLEalert( $(this).data("error-max"), modal_title );

            return false;
        }

        if( parseFloat( sum ) > parseFloat( balance ) )
        {
            DLEalert( $(this).data("error-balance"), modal_title );

            return false;
        }

        ShowLoading('');

		$.get("/engine/ajax/BillingAjax.php", { plugin: "donate", user: $(this).data("user"), group_id: $(this).data("group-id"), sum: sum, comment: comment }, function(data)
		{
			HideLoading('');

			if( data == 'ok' )
            {
                $("#billing-donate-form-comment-" + id).hide();
                $("#billing-donate-form-sum-" + id).hide();
                $("#billing-donate-form-ok-" + id).show();
            }
            else
            {
                DLEalert( data, modal_title );
            }
		});
    });
});
