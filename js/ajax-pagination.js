jQuery(document).ready(function ($) {
  let itemsToShow = 6;
  let itemsCount = $("#image-gallery .col-md-4").length;
  let itemsLoaded = itemsToShow;

  $("#image-gallery .col-md-4:gt(" + (itemsToShow - 1) + ")").hide();

  $("#load-more").click(function () {
    itemsLoaded += itemsToShow;
    $("#image-gallery .col-md-4:lt(" + itemsLoaded + ")").slideDown();

    if (itemsLoaded >= itemsCount) {
      $("#load-more").hide();
      $("#load-less").show();
    } else {
      $("html, body").animate(
        {
          scrollTop: $("#load-more").offset().top,
        },
        150
      );
    }
  });

  $("#load-less").click(function () {
    if (itemsLoaded > itemsToShow) {
      itemsLoaded -= itemsToShow;
      $("#image-gallery .col-md-4:gt(" + (itemsLoaded - 1) + ")").slideUp();

      if (itemsLoaded <= itemsToShow) {
        $("#load-less").hide();
      }

      $("#load-more").show();

      $("html, body").animate(
        {
          scrollTop: $("#load-more").offset().top,
        },
        150
      );
    }
  });

  $("#load-less").hide();
});




// jQuery(document).ready(function($) {
//     let itemsToShow = 6; // Initial items to show
//     let itemsCount = $('#image-gallery .col-md-4').length;
//     let itemsLoaded = itemsToShow;

//     // Initially hide all items beyond the initial items to show
//     $('#image-gallery .col-md-4:gt(' + (itemsToShow - 1) + ')').hide();

//     // Load More button click event
//     $('#load-more').click(function() {
//         itemsLoaded += itemsToShow;
//         $('#image-gallery .col-md-4:lt(' + itemsLoaded + ')').slideDown();

//         if (itemsLoaded >= itemsCount) {
//             $('#load-more').hide();
//             $('#load-less').show();
//         } else {
//             $('html, body').animate({
//                 scrollTop: $('#load-more').offset().top
//             }, 150);
//         }
//     });

//     // Load Less button click event
//     $('#load-less').click(function() {
//         if (itemsLoaded > itemsToShow) {
//             // Calculate the starting index to slide up
//             let startIndex = itemsLoaded - itemsToShow;
//             let endIndex = itemsLoaded;

//             // Slide up the last batch of items
//             $('#image-gallery .col-md-4').slice(startIndex, endIndex).slideUp();

//             // Update itemsLoaded count
//             itemsLoaded -= itemsToShow;

//             // Scroll to show the last three items after loading less
//             if (itemsLoaded <= itemsToShow) {
//                 $('#load-less').hide();
//                 $('#load-more').show();

//                 // Scroll to the third last item
//                 let thirdLastItem = $('#image-gallery .col-md-4').eq(itemsCount - 6);
//                 $('html, body').animate({
//                     scrollTop: thirdLastItem.offset().top
//                 }, 200);
//             } else {
//                 $('html, body').animate({
//                     scrollTop: $('#load-less').offset().top
//                 }, 200);
//             }
//         }
//     });

//     $('#load-less').hide();
// });
