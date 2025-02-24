$(document).ready(function(){
    // Pagination feature
    var currentPage = 1;
    var rowsPerPage = 6; // Default number of rows per page
    var $tableRows = $(".row > .col-md-4"); // Adjust selector to match your rows
    var totalPages = Math.ceil($tableRows.length / rowsPerPage);

    function showPage(page) {
        var start = (page - 1) * rowsPerPage;
        var end = start + rowsPerPage;

        $tableRows.hide().slice(start, end).show();

        // Remove existing page numbers
        $(".page-item.pageNumber").remove();

        // Calculate which page numbers to display
        var startPage = Math.max(1, currentPage - 1);
        var endPage = Math.min(startPage + 2, totalPages);

        // Add calculated page numbers to the HTML markup
        for (var i = startPage; i <= endPage; i++) {
            var $li = $("<li>", { class: "page-item pageNumber" });
            var $link = $("<a>", { class: "page-link", href: "#", text: i });
            if (i === currentPage) {
                $li.addClass("active");
            }
            $li.append($link);
            $li.insertBefore("#nextPage");
        }
    }

    function goToPreviousPage() {
        if (currentPage > 1) {
            currentPage--;
            showPage(currentPage);
        }
    }

    function goToNextPage() {
        if (currentPage < totalPages) {
            currentPage++;
            showPage(currentPage);
        }
    }

    showPage(currentPage);

    $("#previousPage").on("click", function(e) {
        e.preventDefault();
        goToPreviousPage();
    });

    $("#nextPage").on("click", function(e) {
        e.preventDefault();
        goToNextPage();
    });

    $(document).on("click", ".pageNumber", function(e) {
        e.preventDefault();
        var page = parseInt($(this).text());
        currentPage = page;
        showPage(currentPage);
    });
});