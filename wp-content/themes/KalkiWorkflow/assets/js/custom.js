jQuery(document).ready(function($) {
    // Declare the frame variable outside to ensure it doesn't get reinitialized
    var frame;

    // Event listener for the image upload button
    $(".z_upload_image_button").on('click', function(event) {
        event.preventDefault();

        // Ensure the frame is only created once
        if (!frame) {
            // Initialize the media frame only once
            frame = wp.media({
                title: 'Select Image',
                button: {
                    text: 'Use this image'
                },
                multiple: false
            });

            // When an image is selected, update the input fields
            frame.on("select", function() {
                var attachment = frame.state().get("selection").first();
                var attachmentUrl = attachment.attributes.url;
                var attachmentId = attachment.attributes.id;

                // Handle input fields and image preview update
                if ($(this).parent().prev().children().hasClass("tax_list")) {
                    $(this).parent().prev().children().val(attachmentUrl);
                    $(this).parent().prev().prev().children().attr("src", attachmentUrl);
                    $(this).parent().next().children().val(attachmentId);
                } else {
                    $("#zci_taxonomy_image").val(attachmentUrl);
                    $("#zci_taxonomy_image_id").val(attachmentId);
                    $(".zci-taxonomy-image").attr("src", attachmentUrl);
                }
            });
        }

        // Open the frame
        frame.open();
    });

    // Event listener for removing the image
    $(".z_remove_image_button").on('click', function() {
        $(".zci-taxonomy-image").attr("src", "");
        $("#zci_taxonomy_image").val("");
        $("#zci_taxonomy_image_id").val("");
        return false;
    });
});
