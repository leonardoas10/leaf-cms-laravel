const lang = function(token) { 
    $(document).ready(function() {
        $('#toggle').on('click', function () {
            var $this = $(this);
            let lang;
            if ($this.hasClass('lang-en')) {
                $this.removeClass('lang-en');
                $this.addClass('lang-es');
                lang = 'lang-es';
            } else {
                $this.removeClass('lang-es');
                $this.addClass('lang-en');
                lang = 'lang-en';
            }
            $.ajax({    
                headers: {
                    'X-CSRF-Token': token
                },
                method: 'post',
                url: `/lang/${lang}`,
            })
         .then(() => {location.reload()});
        })
    });
}





