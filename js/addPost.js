// If the preview button is clicked, change the form action to preview.php and submit the form
document.getElementById("previewBtn").addEventListener("click", function () {
  var form = document.getElementById("postForm");
  form.action = "/werbsite/php/preview.php";
  form.submit();
});


// Wait for the DOM to be fully loaded before executing the code
document.addEventListener("DOMContentLoaded", function () {
  // Get references to the relevant elements
  var clearButton = document.getElementById("clear");
  var postForm = document.getElementById("postForm");
  var titleInput = document.getElementById("title");
  var contentTextarea = document.getElementById("content");

  // Add click event listener to the clear button
  clearButton.addEventListener("click", function (event) {
    event.preventDefault(); // Prevent the default form submission behavior

    // Display a confirmation dialog to ask if the user wants to clear the form
    var confirmClear = confirm("Are you sure you want to clear the form?");

    // If the user clicks "OK", clear the form inputs
    if (confirmClear) {
      titleInput.value = "";
      contentTextarea.value = "";
      removeHighlight(titleInput);
      removeHighlight(contentTextarea);
    }
    // If the user clicks "Cancel", do nothing and keep the form inputs as they are
  });

  // Add submit event listener to the form
  postForm.addEventListener("submit", function (event) {
    var titleEmpty = titleInput.value.trim() === "";
    var contentEmpty = contentTextarea.value.trim() === "";

    // If the title input is empty, add highlight
    if (titleEmpty) {
      addHighlight(titleInput);
    } else {
      removeHighlight(titleInput);
    }

    // If the content textarea is empty, add highlight
    if (contentEmpty) {
      addHighlight(contentTextarea);
    } else {
      removeHighlight(contentTextarea);
    }

    // If either the title or content is empty, prevent form submission
    if (titleEmpty || contentEmpty) {
      event.preventDefault(); // Prevent the form submission
      alert(
        "Please fill in the highlighted fields before submitting the form."
      );
    }
    // If the title and content are not empty, allow the form submission to proceed
  });

  // Function to add highlight to an element
  function addHighlight(element) {
    element.classList.add("highlight");
  }

  // Function to remove highlight from an element
  function removeHighlight(element) {
    element.classList.remove("highlight");
  }
});
