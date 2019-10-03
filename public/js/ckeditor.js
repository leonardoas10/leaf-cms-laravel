$(document).ready(function(){
    // EDITOR CKEDITOR
     ClassicEditor
         .create( document.querySelector( '#body' ), {
            fillEmptyBlocks: false,
            removePlugins: [ 'MediaEmbed', 'Table', 'ImageUpload',]
         })
         .catch( error => {
             console.error( error );
     } );   
 });