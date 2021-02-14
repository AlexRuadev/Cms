$(document).ready(function() {

    // Editor
    ClassicEditor
        .create( document.querySelector( '#body' ) )
        .catch( error => {
            console.error( error );
        } );

    // 
})

 
