
@if(request()->routeIs('route.blog.post'))
    <footer class="py-sm-2 py-lg-4 bg-light border-left-0 border-right-0 border-bottom-0" style="border: 1px solid #6c757d;">
        <footer-layout></footer-layout>
    </footer>
    @else
    <footer class="py-4 bg-light border-left-0 border-right-0 border-bottom-0" style="border: 1px solid #6c757d;">
        <footer-layout></footer-layout>
    </footer>
@endif