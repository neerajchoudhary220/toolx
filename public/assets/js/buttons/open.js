$(document).ready(function () {


    //-----action button ------//
    $('.open').on('click', 'button', function () {
        var path = $(this).attr("path");


        ajaxHeader();
        $.ajax({
            type: 'post',
            url: Url,
            data: { 'path': path },
            success: function (res) {

            }

        });
    })
    //mousedown hold
    var mousehold;
    $(".open").on('mousedown', 'button', function () {
        var n = 0;
        mousehold = setInterval(() => {
            n = n + 1;
            if (n == 1) {
                var edit = $(this).find('.hidden-edit-btn');
                var dlt = $(this).find('.hidden-dlt-btn');
                edit.removeClass('hidden-edit-btn-hide');
                dlt.removeClass('hideen-dlt-btn-hide');
                $(this).prop('disabled', true);
            }


        }, 1000);
    })
    $('.open').on('mouseup', 'button', function () {
        clearInterval(mousehold);
        console.log("Mouse up");
    })

    $(".open").on('dblclick', 'button', function () {
        var edit = $(this).find('.hidden-edit-btn');
        var dlt = $(this).find('.hidden-dlt-btn');
        edit.addClass('hidden-edit-btn-hide');
        dlt.addClass('hideen-dlt-btn-hide');
        $(this).prop('disabled', false);
    })


    $(".open").on('click', '.hidden-dlt-btn', function () {
        ajaxHeader();
        var id = $(this).attr('id');

        swal({
            title: "Are you sure ?",
            // text: "Yes",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#a94442",
            cancelButtonColor: "#3f51b5",
            confirmButtonText: "Yes ",
            buttons: {
                cancel: {
                    text: "Cancel",
                    value: "cancel",
                    visible: true,
                    className: "btn btn-danger",
                    closeModal: true,
                },
                confirm: {
                    text: 'Yes',
                    value: "ok",
                    visible: true,
                    className: "btn btn-primary",
                    closeModal: true,
                },
            },
        }, function (val) {
            if (val == true) {
                $.ajax({
                    type: 'post',
                    url: deleteUrl,
                    data: { 'id': id },
                    success: function (res) {
                        location.reload(true);

                    }

                });
            }
        });

    });


    // Edit button
    $(".open").on('click', '.hidden-edit-btn', function () {
        ajaxHeader();
        var id = $(this).attr('id');
        $.ajax({
            type: 'post',
            url: editUrl,
            data: { 'id': id },
            success: function (res) {
                $('#editForm').html("");
                $('#editForm').html(res.html);
                $("#collapseThree_2").collapse("show");
                $("#editForm").removeClass('edit-form');
                $("#addForm").addClass('add-form');
            }

        });

    });
    //--------action button end-----//


    //--------collaspse------------//
    $(".addBtn").click(function () {
        $("#editForm").addClass('edit-form');
        $("#addForm").removeClass('add-form');
        $("#collapseThree_2").collapse("toggle");
        // $("#clsBtn").removeClass('closeBtn');


    });

    $(".closeBtn").click(function () {
        $("#collapseThree_2").collapse("hide");
        $("#clsBtn").addClass('closeBtn');


    })



})
