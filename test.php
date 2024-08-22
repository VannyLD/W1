<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comment Submission</title>
    <style>
        * {
            color: #D2AC67;
        }

        @font-face {
            font-family: 'Boss Signature';
            src: url('fonts/BossSignature.woff2') format('woff2'),
                 url('fonts/BossSignature.woff') format('woff');
            font-weight: normal;
            font-style: normal;
            font-display: swap;
        }

        @font-face {
            font-family: 'Khmer OS Metalchrieng';
            src: url('fonts/KhmerOSMetalchrieng.eot');
            src: url('fonts/KhmerOSMetalchrieng.eot?#iefix') format('embedded-opentype'),
                 url('fonts/KhmerOSMetalchrieng.woff2') format('woff2'),
                 url('fonts/KhmerOSMetalchrieng.woff') format('woff'),
                 url('fonts/KhmerOSMetalchrieng.ttf') format('truetype'),
                 url('fonts/KhmerOSMetalchrieng.svg#KhmerOSMetalchrieng') format('svg');
            font-weight: normal;
            font-style: normal;
            font-display: swap;
        }

        label {
            font-family: 'Boss Signature', sans-serif;
            font-size: 2.5rem;
            color: #D2AC67;
        }

        input {
            background-color: none;
        }

        div.hlc:last-child {
            display: none;
        }

        div.slc {
            display: block;
        }

        div.slc:last-child {
            display: block;
        }

        p.hlc {
            margin: 0;
            padding: 0;
        }

        #parent {
            height: 770px;
            overflow-x: hidden;
            overflow-y: auto;
        }

        #comment,
        #form4Example1 {
            width: 100%;
            margin-bottom: 15px;
        }

        #form4Example1 {
            border-radius: 15px;
            border: 1px solid #ccc;
            padding: 10px;
        }

        #comment {
            border: 2px solid #ccc;
            border-radius: 19px;
            height: 70px;
            padding: 10px;
        }

        .btn {
            padding: 5px 15px;
            background-color: #D2AC67;
            border: 1px solid #D2AC67;
            border-radius: 12px;
            color: #FFF;
        }

        .btn:hover {
            cursor: pointer;
            background-color: #D2AC67;
        }

        .slc {
            display: flex;
            flex-direction: column-reverse;
            flex-direction: column;
        }

        .cmt {
            padding: 15px;
            background-color: #ededed;
            margin: 10px 10px 0 0;
            font-family: 'Khmer OS Metalchrieng', sans-serif;
            border-radius: 20px;
        }

        .cmt p {
            padding: 0;
            margin: 0;
        }

        .cmt span {
            text-align: right;
            display: block;
        }

        .cmt i {
            font-size: 1.5rem;
            color: #D2AC67;
        }

        @media only screen and (max-width: 640px) {
            .cmt {
                font-family: unset;
            }
        }
    </style>
</head>
<body>

    <div class="formbg-outer">
        <div class="formbg">
            <div class="formbg-inner padding-horizontal--48">
                <form id="stripe-login" onsubmit="handleSubmit(event)">
                    <div class="field padding-bottom--24">
                        <label for="email">Name</label>
                        <input name="yourname" type="text" id="form4Example1" class="form-control" required />
                    </div>
                    <div class="field padding-bottom--24">
                        <div class="grid--50-50">
                            <label for="password">Comment</label>
                        </div>
                        <textarea name="comment" id="comment" class="form-control" rows="4" required></textarea>
                    </div>
                    <div class="field padding-bottom--24" style="text-align: center;">
                        <input class="btn" type="submit" name="submit" value="Send">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="cmtlast" class="js-scroll fade-in-bottom">
        <!-- Submitted comments will appear here -->
    </div>

    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', () => {
            // Load existing comments from localStorage
            loadComments();
        });

        function handleSubmit(event) {
            event.preventDefault();

            // Get the form data
            const name = document.getElementById('form4Example1').value;
            const comment = document.getElementById('comment').value;

            // Save the comment to localStorage
            saveComment(name, comment);

            // Add the comment dynamically to the page
            const commentSection = document.getElementById('cmtlast');
            const newComment = document.createElement('div');
            newComment.className = 'cmt slc';
            newComment.innerHTML = `<p><i>&#9787;</i> ${name}</p><span>${comment}<i> &#9754;</i></span>`;
            commentSection.appendChild(newComment);

            // Clear the form fields
            document.getElementById('stripe-login').reset();
        }

        function saveComment(name, comment) {
            // Retrieve existing comments from localStorage
            let comments = JSON.parse(localStorage.getItem('comments')) || [];

            // Add the new comment
            comments.push({ name, comment });

            // Save the updated comments back to localStorage
            localStorage.setItem('comments', JSON.stringify(comments));
        }

        function loadComments() {
            // Retrieve comments from localStorage
            const comments = JSON.parse(localStorage.getItem('comments')) || [];

            // Display the comments
            const commentSection = document.getElementById('cmtlast');
            comments.forEach(({ name, comment }) => {
                const newComment = document.createElement('div');
                newComment.className = 'cmt slc';
                newComment.innerHTML = `<p><i>&#9787;</i> ${name}</p><span>${comment}<i> &#9754;</i></span>`;
                commentSection.appendChild(newComment);
            });
        }
    </script>

</body>
</html>
