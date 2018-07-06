$(function () {

    $('html').on('click', '.j_order', function () {

        $(this).fadeOut(function () {
            $('.j_order_remove').fadeIn();
            $('.j_drag_active').attr('draggable', true);
        });

        $('html').on('click', '.j_order_remove', function () {
            $(this).fadeOut(function () {
                $('.j_order').fadeIn();

                $('.j_drag_active').removeAttr('draggable');
                $('html').unbind('drag dragover dragleave drop');
            });
        });

        $('html').on('drag', '.j_drag_active', function (event) {
            event.preventDefault();
            event.stopPropagation();
            dragContent = $(this);
            dragIndex = $(this).index();
        });

        $('html').on('dragover', '.j_drag_active', function (event) {
            event.preventDefault();
            event.stopPropagation();
            $(this).css('border', '1px dashed #CCC');
        });

        $('html').on('dragleave', '.j_drag_active', function (event) {
            event.preventDefault();
            event.stopPropagation();
            $(this).css('border', '0');
        });

        $('html').on('drop', '.j_drag_active', function (event) {
            event.preventDefault();
            event.stopPropagation();

            $(this).css('border', '0');

            dropElement = $(this);

            if (dragIndex > dropElement.index()) {
                dropElement.before(dragContent);
            } else {
                dropElement.after(dragContent);
            }

            reorder = new Array();
            $.each($('.j_drag_active'), function (i, element) {
                reorder.push([element.id, i + 1]);
            });

            $.post('controller.php', {action: 'reorder_courses', data: reorder});
        });

    });

});