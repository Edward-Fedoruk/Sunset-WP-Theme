$(document).ready(function() {

  var mediaUploader

  $("#upload-button").on("click", function(e) {
    e.preventDefault()

    mediaUploader = wp.media.frames.fine_name = wp.media({
      title: "Choose profile picture",
      button: {
        text: "Choose picture"
      },
      multiple: false
    })  

    mediaUploader.on("select", function() {
      var attachment = mediaUploader.state().get("selection").first().toJSON()
      $("#profile-picture").val(attachment.url)
      $("#profile-picture-preview").attr("src", attachment.url)
    })

    mediaUploader.open()

  })

})