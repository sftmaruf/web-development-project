<?php
require 'header.php';
?>

<section class="container">
    <div class="writepost-container d-flex flex-column rounded">
        <input onclick="hideWarning()" type="text" name="" id="post-title" placeholder="New post title here...">
        <input onclick="hideWarning()" onkeyup="validateTag(this)" type="text" id="post-tags" placeholder="Add up to 4 tags...">
        <textarea onclick="hideWarning()" name="" id="post-body" cols="30" rows="10" placeholder="Write your post content here..."></textarea>
    </div>
    <br>
    <div class="button-container d-flex">
        <button id="publish-button" onclick="makeAjaxCallForPostArticleToDB()" class='btn btn-primary mr-2'>Publish</button>
        <button id="save-draft-button" class="btn btn-light">Save Draft</button>

        <div id="success-messege" class='alert alert-success' role="alert" hidden>Article posted successfully</div>
        <div id="unsuccess-messege" class='alert alert-danger' hidden>Article isn't posted successfully</div>
        <div id="empty-messege" class='alert alert-warning' hidden>Please fill all the inputs</div>
    </div>
</section>

<script>
    const emptyMessege = document.getElementById('empty-messege');
    const publishButton = document.getElementById('publish-button');
    const successMessege = document.getElementById('success-messege');
    const saveDraftButton = document.getElementById('save-draft-button');
    const unseuccessMessege = document.getElementById('unsuccess-messege');

    let matchedString = '';

    function validateTag(input) {
        const key = event.keyCode || event.charCode;

        const keyCodeBackspace = 8;
        const charCodeBackspace = 46;
        const keyCodeLeftArrow = 37;
        const keyCodeRightArrow = 39;
        
        if (key === keyCodeBackspace || key === charCodeBackspace) {
            matchedString.split('').pop();
        } else if (key === keyCodeLeftArrow || key === keyCodeRightArrow) {} else {
            processInputFieldValue(input);
        }
    }

    function processInputFieldValue(input) {
        const inputValues = input.value;
        const lastWordOfInput = inputValues[inputValues.length - 1];

        const checkSpace = /\s/;
        const EliminateSpace = /[^a-zA-Z0-9,]/gi;

        if (lastWordOfInput.match(EliminateSpace)) {
            input.value = input.value.replace(EliminateSpace, "");
            input.value = matchedString;
        } else {
            if (lastWordOfInput === ',') {
                input.value += ' ';
            }
            matchedString = input.value;
        }
    }

    function hideWarning(){
        emptyMessege.hidden = true;
        successMessege.hidden = true;
        unseuccessMessege.hidden = true;
        publishButton.hidden = false;
        saveDraftButton.hidden = false;
    }

    function makeAjaxCallForPostArticleToDB() {
        const postTitle = document.getElementById('post-title').value;
        const postBody = document.getElementById('post-body').value;
        const postTags = document.getElementById('post-tags').value;

        ajaxCall(postTitle, postTags, postBody);
    }

    function ajaxCall(postTitle, postTags, postBody) {
        $.ajax({
            url: 'PHP/submitposttodb.script.php',
            method: 'POST',
            dataType: 'json',
            data: {
                pTitle: postTitle,
                pTags: postTags,
                pBody: postBody
            },
            success: (response) => {
                publishButton.hidden = true;
                saveDraftButton.hidden = true;

                if (response === 'successful') {
                    successMessege.hidden = false;
                } else if (response === 'empty') {
                    emptyMessege.hidden = false;
                } else {
                    unseuccessMessege.hidden = false;
                }
            }
        });
    }
</script>

<?php
require 'footer.php';
?>