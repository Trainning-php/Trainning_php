var textareaID = document.getElementById("ckediter");
if (textareaID !== null) {
	textareaID = textareaID.id;
}
if (textareaID === "ckediter") {
    var editor1 = CKEDITOR.replace( 'ckediter' );
    CKFinder.setupCKEditor( editor1 );
    var parser = new CKEDITOR.htmlParser();
    parser.onTagOpen = function( tagName, attributes, selfClosing ) {
    alert( tagName );
    };
}




	
	

