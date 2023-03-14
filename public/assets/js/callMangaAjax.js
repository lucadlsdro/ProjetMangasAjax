$(document).ready(function(){
    jQuery('#btn-add').click(function () {
        jQuery('#callMangaAjax').val("add");
    });
        $("#callMangaAjax").click(function(e){
        e.preventDefault();
        let uneUrl = 'https://localhost:/luca/laravel/ProjetMangas/public/callMangaAjax/' + $('#idGenres option:selected').val();
        $.ajax({
            type: 'GET',
            url : uneUrl,
            success: function (data) {
                $("#resultat").html(data);
            },
            error: function (data) {
                alert('erreur :' + 'callMangaAjax/' + $('#genre option:selected').val());
            }

        }
        );
        });
});
