Array.prototype.equals = function (array) {
    // if the other array is a falsy value, return
    if (!array)
        return false;

    // compare lengths - can save a lot of time
    if (this.length != array.length)
        return false;

    for (var i = 0, l=this.length; i < l; i++) {
        // Check if we have nested arrays
        if (this[i] instanceof Array && array[i] instanceof Array) {
            // recurse into the nested arrays
            if (!this[i].equals(array[i]))
                return false;
        }
        else if (this[i] != array[i]) {
            // Warning - two different object instances will never be equal: {x:20} != {x:20}
            return false;
        }
    }
    return true;
}
$(document).ready(function(){
    let brandIds = $('input[name="CarSearch[brandIds][]"]:checked').map(function() {
        return $(this).val();
    }).get();
    let autoModelIds = $('input[name="CarSearch[autoModelIds][]"]:checked').map(function() {
        return $(this).val();
    }).get();
    $('#filter').click(function () {
        let newBrandIds = $('input[name="CarSearch[brandIds][]"]:checked').map(function() {
            return $(this).val();
        }).get();
        let newAutoModelIds = $('input[name="CarSearch[autoModelIds][]"]:checked').map(function() {
            return $(this).val();
        }).get();
        let engineTypeIds = $('input[name="CarSearch[engineTypeIds][]"]:checked').map(function() {
            return $(this).val();
        }).get();
        let driveUnitIds = $('input[name="CarSearch[driveUnitIds][]"]:checked').map(function() {
            return $(this).val();
        }).get();
        if(!brandIds.equals(newBrandIds) || !autoModelIds.equals(newAutoModelIds)) {
            $.ajax({
                type: 'GET',
                url: '/site/get-url',
                dataType: 'text',
                data: {'brandIds': newBrandIds, 'autoModelIds': newAutoModelIds, 'engineTypeIds': engineTypeIds, 'driveUnitIds': driveUnitIds},
                success: function (result) {
                    window.location.replace(result);
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    console.log(xhr.status);
                    console.log(thrownError);
                }
            });
        } else {
            $.ajax({
                type: 'GET',
                url: '/',
                dataType: 'text',
                data: {'brandIds': newBrandIds, 'autoModelIds': newAutoModelIds, 'engineTypeIds': engineTypeIds, 'driveUnitIds': driveUnitIds},
                success: function (result) {
                    $(".products").html(result);
                    $.ajax({
                        type: 'GET',
                        url: '/site/get-url',
                        dataType: 'text',
                        data: {'brandIds': newBrandIds, 'autoModelIds': newAutoModelIds, 'engineTypeIds': engineTypeIds, 'driveUnitIds': driveUnitIds},
                        success: function (result) {
                            window.history.pushState(result,'123', result);
                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                            console.log(xhr.status);
                            console.log(thrownError);
                        }
                    });
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    console.log(xhr.status);
                    console.log(thrownError);
                }
            });
        }
    });

    $('input[name="CarSearch[brandIds][]"]').change(function () {
        let brandIds = $('input[name="CarSearch[brandIds][]"]:checked').map(function() {
            return $(this).val();
        }).get();
        let modelIds = $('input[name="CarSearch[autoModelIds][]"]:checked').map(function() {
            return $(this).val();
        }).get();
        $.ajax({
            type: 'GET',
            url: '/site/get-models',
            dataType: 'html',
            data: {'brandIds': brandIds, 'modelIds': modelIds},
            success: function (result) {
                $("#model__filter").html(result);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr.status);
                console.log(thrownError);
            }
        });
    });
});