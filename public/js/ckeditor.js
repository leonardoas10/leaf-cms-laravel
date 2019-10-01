$(document).ready(function(){
    // EDITOR CKEDITOR
     ClassicEditor
         .create( document.querySelector( '#body' ), {
            removePlugins: [ 'MediaEmbed', 'Table', 'ImageUpload',]
         })
         .catch( error => {
             console.error( error );
     } );   
 });