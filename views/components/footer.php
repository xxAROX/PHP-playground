<footer class="text-center py-3 my-4 border-top fixed-bottom">
    <div class="align-items-center">
        <span class="mb-3 mb-md-0 text-muted" id="copydate">© {DATE} <a style="text-decoration: none;" target="_blank" href="https://github.com/xxAROX">Jan Sohn</a></span>
    </div>
</footer>

<script defer>
    const span = document.getElementById("copydate");
    if (span) {
        const created = 2023;
        const current = new Date().getFullYear();
        if (created < current) span.innerHTML = span.innerHTML.replace("{DATE}", `${created}-${current}`);
        else span.innerHTML = span.innerHTML.replace("{DATE}", created);
    }
</script>
