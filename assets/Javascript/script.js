// function _next_page(next_id) {
//     $('.next-div').hide();
//     $('#'+next_id).fadeIn(1000);
// }

function _open_menu() {
  $('.menu-bar-overall-div').animate({'margin-left':'0%'},200);
  $('.side-menu-bar').animate({'margin-left':'0px'},400);
}




function _close_menu() {
  $('.menu-bar-overall-div').animate({'margin-left':'-1000%'},400);
  $('.side-menu-bar').animate({'margin-left':'-250px'},200);
}

$(document).ready(function() {
    $('.menu-toggle').on('click', function() {
      $('.nav').toggleClass('showing')  
    });


    const mobileBreakpoint = 755;
    const searchIcon = document.querySelector('.search-icon');
    const headerSearchForm = document.querySelector('.header-search-form');
    const searchInput = document.querySelector('.search-input');
    const logoWrapper = document.querySelector('.logo-wrapper');
    

    function toggleSearchBar() {
        searchIcon.classList.toggle('hide');
        headerSearchForm.classList.toggle('hide');
        searchInput.focus();
        if (innerWidth <= mobileBreakpoint) {
            logoWrapper.classList.toggle('hide');
        }
    }

    searchIcon.addEventListener('click', toggleSearchBar);
    searchInput.addEventListener('blur', toggleSearchBar);

    // Navbar Responsivenes
    const menuIcon = document.querySelector('.menu-icon');
    const navOverlay = document.querySelector('.nav-overlay');
    const navMenu = document.querySelector('.navmenu');
    const dropdowns = document.querySelectorAll('.navitem .dropdown');

    menuIcon.addEventListener('click', function () {
        navOverlay.classList.toggle('open');
        navMenu.classList.toggle('open');
    });

    navOverlay.addEventListener('click', function () {
        navOverlay.classList.remove('open');
        navMenu.classList.remove('open');
    })

    dropdowns.forEach(dropdown => {
        const navItem = dropdown.closest('.navitem');
        navItem.addEventListener('click', function () {
            navItem.classList.toggle('active');
        });
    });


    



    
$('.post-slider').each(function(index, slider) {
    $(slider).slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      autoplay: false,
      infinite: false,
      autoPlaySpeed: 2000,
      nextArrow: $(slider).siblings('.next-arrow'),
      prevArrow: $(slider).siblings('.prev-arrow'),
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 3
          }
        },

        {
          breakpoint: 550,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }

      ]
    });
});


});


// window.onload = function () {
//   if (window.jquery) {
//     alert("Jquery is loaded");
//   }else{
//     alert("Jquery is not Loaded");
//   }
// }


// function _show_add_faculty() {
//     $('.add-faculty-overall').animate({'margin-top':'0%'},100);
//     $('.add-faculty-main').animate({'margin-top':'0px'},500);
// }

// function _show_student() {
//     $('.overall-student').animate({'margin-left':'0%'},100);
// }

// function _hide_student() {
//     $('.overall-student').animate({'margin-left':'-1000%'},1000);
// }


// function _hide_add_faculty() {
//     $('.add-faculty-overall').animate({'margin-top':'-1000%'},1000);
//     $('.add-faculty-main').animate({'margin-top':'-250px'},600);
// }




// function _validate_inputs(){
//     var message = 'Fill in the necessary fields to continue';

//     var Firstname= $('#firstname').val(); 
//     var Middlename= $('#middlename').val();
//     var Lastname= $('#lastname').val();
//     var Age= $('#age').val();
//     var Gender= $('#gender').val();
//     var Email= $('#email').val();
//     var Country= $('#country').val();
//     var City= $('#city').val();
//     var Lga= $('#lga').val();
//     var Residentialaddress= $('#residentialaddress').val();
//     var Department= $('#department').val();
//     var Role= $('#role').val(); 
//     var Level= $('#level').val(); 
//     var facultyname= $('#facultyname').val();
//     var departmentname= $('#departmentname').val();
//     var coursecode= $('#coursecode').val();
//     var coursename= $('#coursename').val();
//     var selectstaff= $('#selectstaff').val();
//     var picklevel= $('#picklevel').val();
//     var selectlevel= $('#selectlevel').val();
//     var choosestaff= $('#choosestaff').val();
//     var week= $('#week').val();
//     var topic= $('#topic').val();
//     var period= $('#period').val();
//     var summary= $('#summary').val();


//     if( (Firstname=='') || (Middlename=='') || (Lastname=='') || (Age=='') || (Gender=='') || (Email=='') ||
//     (Country=='') || (City=='') || (Lga=='') || (Residentialaddress=='') || (Department=='') 
//     || (Role=='') || (Level=='') || (departmentname =='')  ){
//         alert(message);
//     }
// }


// function displayImage(image){
//     if (image.files[0]) {
//         var reader = new FileReader();
//         reader.onload= function(image){
//             document.querySelector('#ImageDisplay').setAttribute('src', image.target.result);
//         }
//         reader.readAsDataURL( image.files[0]);
//     }
// }



// function triggerClick(){
//     document.querySelector('#ImageSelector').click();
// }



// // VIDEO SCRIPT //
// function showVideo(video) {
//     if (video.files[0]){
//         var reader = new FileReader();

//         reader.onload = function(video) {
//             document.querySelector('#videoDisplay').setAttribute('src', video.target.result);
//         }
//         reader.readAsDataURL(video.files[0]);
//     }
// }


// (function alternate_text () {
//     var words = [
//         "Ounje'l'Eyin",
//         "Aje Yee !!!"
//     ],
//     i = 0;
//     setInterval(function() {
//       $('#words').fadeOut(function() {
//           $(this).html(words[(i = (i + 1) % words.length)]).fadeIn();

//       });
//     }, 1500)
// })();


ClassicEditor.create(document.getElementById("body"), {
  // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
  toolbar: {
      items: [
          'exportPDF','exportWord', '|',
          'findAndReplace', 'selectAll', '|',
          'heading', '|',
          'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
          'bulletedList', 'numberedList', 'todoList', '|',
          'outdent', 'indent', '|',
          'undo', 'redo',
          '-',
          'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
          'alignment', '|',
          'link', 'insertImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock', 'htmlEmbed', '|',
          'specialCharacters', 'horizontalLine', 'pageBreak', '|',
          'textPartLanguage', '|',
          'sourceEditing'
      ],
      shouldNotGroupWhenFull: true
  },
  // Changing the language of the interface requires loading the language file using the <script> tag.
  // language: 'es',
  list: {
      properties: {
          styles: true,
          startIndex: true,
          reversed: true
      }
  },
  // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
  heading: {
      options: [
          { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
          { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
          { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
          { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
          { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
          { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
          { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
      ]
  },
  // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
  placeholder: 'Enter the Body of the Post',
  // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-family-feature
  fontFamily: {
      options: [
          'default',
          'Arial, Helvetica, sans-serif',
          'Courier New, Courier, monospace',
          'Georgia, serif',
          'Lucida Sans Unicode, Lucida Grande, sans-serif',
          'Tahoma, Geneva, sans-serif',
          'Times New Roman, Times, serif',
          'Trebuchet MS, Helvetica, sans-serif',
          'Verdana, Geneva, sans-serif'
      ],
      supportAllValues: true
  },
  // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
  fontSize: {
      options: [ 10, 12, 14, 'default', 18, 20, 22 ],
      supportAllValues: true
  },
  // Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.
  // https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features
  htmlSupport: {
      allow: [
          {
              name: /.*/,
              attributes: true,
              classes: true,
              styles: true
          }
      ]
  },
  // Be careful with enabling previews
  // https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews
  htmlEmbed: {
      showPreviews: true
  },
  // https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
  link: {
      decorators: {
          addTargetToExternalLinks: true,
          defaultProtocol: 'https://',
          toggleDownloadable: {
              mode: 'manual',
              label: 'Downloadable',
              attributes: {
                  download: 'file'
              }
          }
      }
  },
  // https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html#configuration
  mention: {
      feeds: [
          {
              marker: '@',
              feed: [
                  '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes', '@chocolate', '@cookie', '@cotton', '@cream',
                  '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread', '@gummi', '@ice', '@jelly-o',
                  '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding', '@sesame', '@snaps', '@soufflé',
                  '@sugar', '@sweet', '@topping', '@wafer'
              ],
              minimumCharacters: 1
          }
      ]
  },
  // The "super-build" contains more premium features that require additional configuration, disable them below.
  // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
  removePlugins: [
      // These two are commercial, but you can try them out without registering to a trial.
      // 'ExportPdf',
      // 'ExportWord',
      'CKBox',
      'CKFinder',
      'EasyImage',
      // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
      // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
      // Storing images as Base64 is usually a very bad idea.
      // Replace it on production website with other solutions:
      // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
      // 'Base64UploadAdapter',
      'RealTimeCollaborativeComments',
      'RealTimeCollaborativeTrackChanges',
      'RealTimeCollaborativeRevisionHistory',
      'PresenceList',
      'Comments',
      'TrackChanges',
      'TrackChangesData',
      'RevisionHistory',
      'Pagination',
      'WProofreader',
      // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
      // from a local file system (file://) - load this site via HTTP server if you enable MathType.
      'MathType',
      // The following features are part of the Productivity Pack and require additional license.
      'SlashCommand',
      'Template',
      'DocumentOutline',
      'FormatPainter',
      'TableOfContents'
  ]
});