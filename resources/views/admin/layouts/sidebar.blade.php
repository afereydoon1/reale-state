<aside id="sidebar" class="sidebar">
    <section class="sidebar-container">
        <section class="sidebar-wrapper">

            <a href="#" class="sidebar-link">
                <i class="fas fa-home"></i>
                <span>خانه</span>
            </a>

            <section class="sidebar-part-title">بخش محتوا</section>

            <section class="sidebar-group-link">
                <section class="sidebar-dropdown-toggle">
                    <i class="fas fa-chart-bar icon"></i>
                    <span>محتوا</span>
                    <i class="fas fa-angle-left angle"></i>
                </section>
                <section class="sidebar-dropdown">
                    <a href="{{ route('postCategories.index') }}">لیست دسته بندی ها</a>
                    <a href="{{ route('posts.index') }}"> پست ها</a>
                    <a href="{{ route('content.comment.index') }}">کامنت ها</a>
                </section>
            </section>

            <section class="sidebar-part-title">بخش آگهی</section>

            <section class="sidebar-group-link">
                <section class="sidebar-dropdown-toggle">
                    <i class="fas fa-chart-bar icon"></i>
                    <span>آگهی ها</span>
                    <i class="fas fa-angle-left angle"></i>
                </section>
                <section class="sidebar-dropdown">
                    <a href="{{ route('ads.index') }}">لیست اگهی ها</a>
                    <a href="{{ route('slide_show.index') }}">اسلاید شو</a>
                    <a href="{{ route('ads_categories.index') }}">دسته بندی آگهی ها</a>
                </section>
            </section>

            <section class="sidebar-part-title">بخش کاربران</section>

            <section class="sidebar-group-link">
                <section class="sidebar-dropdown-toggle">
                    <i class="fas fa-users icon"></i>
                    <span>کاربران</span>
                    <i class="fas fa-angle-left angle"></i>
                </section>
                <section class="sidebar-dropdown">
                    <a href="{{ route('admin_user.index') }}">کاربران ادمین</a>
                    <a href="{{ route('customer_user.index') }}">مشتریان</a>
                    <a href="{{ route('roles.index') }}">لیست نقش ها </a>
                    <a href="{{ route('permissions.index') }}">لیست دسترسی ها </a>
                </section>
            </section>

            <section class="sidebar-part-title">بخش کاربران</section>

            <section class="sidebar-group-link">
                <section class="sidebar-dropdown-toggle">
                    <i class="fas fa-cogs icon"></i>
                    <span>تنظیمات منو</span>
                    <i class="fas fa-angle-left angle"></i>
                </section>
                <section class="sidebar-dropdown">
                    <a href="#">منوی هدر</a>
                    <a href="#">منوی فوتر</a>
                </section>
            </section>


        </section>
    </section>
</aside>
