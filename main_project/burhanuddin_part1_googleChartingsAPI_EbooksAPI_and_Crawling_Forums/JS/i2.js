			// Shorthand for $( document ).ready()
			$(function() {
				/* DEMO */
				// initialize variables
				var start = <?php echo $_SESSION['posts_start']; ?>;
				var initialPosts = <?php echo get_posts(0, $_SESSION['posts_start']); ?>;
				var desiredPosts = <?php echo $number_of_posts; ?>;
				// either null or contains the mustache template
				var template = '<div class="item">'
					+'<p class="post-content0"></p>'
					+'<p class="post-content1"></p>'
					+'<p class="post-content2"></p>'
					+'<a href="#"><h4 class="post-content3"></h4></a>'
//					+'<p class="post-content3">View Details</p>'
					//+'<a href="#" class="post-content3"></a>'
					+'</div>';
			
				var widget = $('#widget'),
				// Element to load the posts
				content = widget.find('.content'),
				// the more button
				more = widget.find('.more'),
				// the post counter
				counter = widget.find('.badge');

				// Create alerts elements (Display Success or Failure)
				var alerts = {
					requestEmpty : $('<div class="alert alert-info">No more data</div>'),
					requestFailure : $('<div class="alert alert-error">Could not get the data. Try again!</div>')
				}
				var progressElement = $('<div class="progress" style="margin-bottom:0"><div class="bar"></div></div>');
				var progressBar = progressElement.find('.bar');
				
				// function that handle posts
				var postHandler = function(posts){
					// Set the progress bar to 100%
					progressBar.css('width', '100%');
					// Delay the normal more button to come back for a better effect
					window.setTimeout(function(){more.html('More <span class="caret"></span>')}, 1000);
					// insert childrens at the end of the content element
					for (post in posts){
						// Clone the element
						var $post = $(template).clone();
						$post.attr('id', 'post-' + posts[post].ID);
						$post.find('.post-title').html(posts[post].post_title);
						$post.find('.post-content0').html(posts[post].post_content0);
						$post.find('.post-content1').html(posts[post].post_content1);
						$post.find('.post-content2').html(posts[post].post_content2);
						$post.find('.post-content3').html(posts[post].post_content3);
						content.append($post);
					}
					// Scroll to the first element loaded
					content.animate({
						scrollTop: $('#post-' + posts[0].ID).offset().top + (content.scrollTop()- content.offset().top)
					}, 200);
				}

				// place the initial posts in the page
				postHandler(initialPosts);

				// add the click event to the more button
				more.click(function(){  
					// Set the progress bar to 0%
					//progressBar.css('width', '0%');
					// remove the more button innerHTML and insert the progress bar
					more.empty().append(progressElement);
					// AJAX REQUEST
					$.ajax({
						type: 'GET',
						// We do not want IE to cache the result
						cache: false,
						data:{  
							'start': start,  
							'desiredPosts': desiredPosts  
							} 
					}).success(function (data, text) {
					
						data = JSON.parse(data);
						if (data.length > 0){
							// Updat`e the total number of items
							start += data.length;
							// Update the counter
							counter.html(start);
							// load items on the page
							postHandler(data);
						}
						else{
							$alert = alerts.requestEmpty;
							// insert the empty message
							widget.prepend($alert);
							// Set the progress bar to 100%
							progressBar.css('width', '100%');
							// Remove the more button
							window.setTimeout(function(){more.remove()}, 1000);
							// remove the empty message after 4 seconds
							window.setTimeout(function(){$alert.remove()}, 4000);
						}
					}).error(function (request, status, error) {
						$alert = alerts.requestFailure;
						// insert the failure message
						widget.prepend($alert);
						// Set the progress bar to 100%
						progressBar.css('width', '100%');
						// Delay the normal more button to come back for a better effect
						window.setTimeout(function(){more.html('More <span class="caret"></span>')}, 1000);
					});
				});
			});
