$(document).ready(function() {
    $('#selectAllBoxes').on('click', function () {
        var $this = $(this);
        if ($this.hasClass('check')) {
            $this.removeClass('check');
            $this.addClass('uncheck');
            $this.val('Check All');
            $('.checkBoxes').each(function(index, checkbox) {
                this.checked = false;
            });
        } else {
            $this.removeClass('uncheck');
            $this.addClass('check');
            $this.val('Uncheck All');

            $('.checkBoxes').each(function(index, checkbox) {
                this.checked = true;
            });
        }
    });
});

const bulkOperations = function(model, token) {    
    $(document).ready(function() {
        $('#apply').on('click', () => {
            const operation = $('#bulk_options').val();
            const checkBoxesIds = [];
            const checkBoxes = $('.checkBoxes:checked').each((index, checkbox) => {
                checkBoxesIds.push(checkbox.value)
            });
            console.log(checkBoxes, 'AQUI');
            $.ajax({    
                method: 'post',
                url: `/admin/bulk/${operation}`,
                
                data: {
                    "_token": token,
                    ids: checkBoxesIds,
                    model: model
                },
            })
            .then(location.reload());
        })
    });
}

