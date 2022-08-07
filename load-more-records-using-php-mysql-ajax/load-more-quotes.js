$(document).ready(function(){
    /**
     * Call load quotes as soon as page ready
     */
    loadMoreQuotes();
});
function loadMoreQuotes(){
    let page = parseInt($("#page").val());
    page = page + 1;
    let quotesHtml = ``;
    $.ajax({
        url: "load-more-script.php",
        method: "POST",
        data: {
            request_name: "load-more-quotes",
            page: page,
        },
        beforeSend: function(){
            /**
             * Show the loading icon in load more button
             */
            $("#loading").removeClass('d-none');
        },
        success: function (response){
            /**
             * Prepare the html of quotes
             * @type {any}
             */
            response = JSON.parse(response);
            let quotes = response.data;
            if(quotes.length > 0) {
                $.each(quotes, function (key, value) {
                    quotesHtml += `<div class="card card-signin my-3">
                                    <div class="card-body">
                                        <blockquote class="blockquote mb-0">
                                            <p>${value.quote}</p>
                                            <footer class="blockquote-footer">Someone famous in <cite title="Source Title">${value.author}</cite></footer>
                                        </blockquote>
                                    </div>
                                </div>`;
                });
                /**
                 * Update the page page number to track the no. of calls
                 * Append quotes html prepared to div
                 * Conditionally show/hide the load more button
                 */
                $("#page").val(page);
                $("#quotes-container").append(quotesHtml);
                if (response.remaining_quotes == 0) {
                    $("#load-more-btn").hide();
                }
            }
        },
        error: function(errorResponse){
            console.error(errorResponse)
        },
        complete: function(){
            /**
             * Hide loading icon each time when api call completes
             */
            $("#loading").addClass('d-none');
        }
    })
}
