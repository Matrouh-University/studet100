<?php
// تحديد عنوان URL للصفحة التي تريد جلبها
$url = 'https://forms.office.com/Pages/ResponsePage.aspx?id=g-7HGK8Q8EOo5nN8jkdz9B15TBvcGsNNrVGa5ctCU-dURUhRWUZKUjdDOUJTN1U1MjVEQUxVVE9MMy4u&embed=true';

// جلب محتوى الصفحة
$pageContent = file_get_contents($url);

// التحقق من أن الصفحة تم جلبها بنجاح
if ($pageContent !== false) {
    // إنشاء كائن DOMDocument
    $doc = new DOMDocument();
    @$doc->loadHTML($pageContent);

    // العثور على عنصر الـ <nav> وحذفه
    $navs = $doc->getElementsByTagName('nav');
    if ($navs->length > 0) {
        $nav = $navs->item(0);
        $nav->parentNode->removeChild($nav);
    }

    // عرض المحتوى بدون الـ <nav>
    echo $doc->saveHTML();
} else {
    echo "خطأ في جلب الصفحة.";
}
