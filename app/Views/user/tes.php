<html>

<head>

</head>
<style>
    #pageCounter {
        counter-reset: pageTotal;
    }

    #pageCounter span {
        counter-increment: pageTotal;
    }

    #pageNumbers {
        counter-reset: currentPage;
    }

    #pageNumbers div:before {
        counter-increment: currentPage;
        content: "Page "counter(currentPage) " of ";
    }

    #pageNumbers div:after {
        content: counter(pageTotal);
    }


    .page {
        counter-reset: page;
    }

    .page .page-number {
        display: block;
    }

    .page .page-number:after {
        counter-increment: page;
        content: counter(page);
    }

    .page:after {
        display: block;
        content: "Number of pages: "counter(page);
    }
</style>
<script></script>

<body onload="window.print()">

    <div id="pageCounter">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>
    <div id="pageNumbers">
        <div class="page-number"></div>
        <div class="page-number"></div>
        <div class="page-number"></div>
        <div class="page-number"></div>
        <div class="page-number"></div>
    </div>

    <div style="page-break-after: always;"></div>


    <div class="page">
        <span class="page-number">Page </span>
        <span class="page-number">Page </span>
        <span class="page-number">Page </span>
        <span class="page-number">Page </span>
    </div>

</body>

</html>