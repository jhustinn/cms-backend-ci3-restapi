<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.1.1/flowbite.min.css" rel="stylesheet" />

<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        <?= $title; ?>
    </h2>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
        <div class="text-center mr-2 mb-2"> <a class="button inline-block bg-theme-1 text-white addCarouselBtn">Add
                Carousel</a> </div>
    </div>
</div>
<div class="grid lg:grid">

    <!-- BEGIN: Datatable -->
    <div class="intro-y datatable-wrapper box p-5 mt-5">
        <table class="table table-report table-report--bordered display datatable w-full" id="category_table">
            <thead>
                <tr>
                    <th class="border-b-2 whitespace-no-wrap">Title</th>
                    <th class="border-b-2 whitespace-no-wrap">Image</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($carousel as $car): ?>
                    <tr>
                        <td class="border-b">
                            <div class="font-medium whitespace-no-wrap">
                                <?= $car['judul']; ?>
                            </div>
                        </td>
                        <td class="border-b">
                            <div class="font-medium whitespace-no-wrap">
                                <?= $car['foto']; ?>
                            </div>
                        </td>
                        <td class="border-b w-5">
                            <div class="flex sm:justify-center items-center">
                                <a class="flex items-center text-theme-6 deleteCarouselBtn"
                                    href="<?= base_url('carousel/deletePhoto/') . $car['foto']; ?>">
                                    <i data-feather="trash-2" class="w-4 h-4 mr-1"></i>
                                    Delete </a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- END: Datatable -->
</div>


<div class="intro-y box mt-5">
    <div class="flex items-center p-5 border-b border-gray-200">
        <h2 class="font-medium text-base mr-auto">
            Carousel Preview
        </h2>
    </div>
    <div class="p-5">
        <div class="intro-y  box">


            <div id="default-carousel" class="relative w-full" data-carousel="slide">
                <!-- Carousel wrapper -->
                <div class="relative h-96 overflow-hidden rounded-lg md:h-96">
                    <!-- Item 1 -->
                    <?php foreach ($carousel as $c): ?>
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="<?= base_url('assets/images/carousel/') . $c['foto']; ?>"
                                class="absolute h-fit block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="...">
                        </div>
                    <?php endforeach; ?>
                </div>
                <!-- Slider indicators -->
                <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                    <?php $s = 1;
                    $i = 0;
                    foreach ($carousel as $c): ?>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="true"
                            aria-label="Slide <?= $s++; ?>" data-carousel-slide-to="<?= $i++ ?>"></button>
                    <?php endforeach; ?>
                </div>
                <!-- Slider controls -->
                <button type="button"
                    class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                    data-carousel-prev>
                    <span
                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 1 1 5l4 4" />
                        </svg>
                        <span class="sr-only">Previous</span>
                    </span>
                </button>
                <button type="button"
                    class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                    data-carousel-next>
                    <span
                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="sr-only">Next</span>
                    </span>
                </button>
            </div>

        </div>
    </div>
</div>

<div class="modal" id="addCarouselModal">
    <div class="modal__content">
        <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
            <h2 class="font-medium text-bPhotoe mr-auto">Add Carousel</h2>
            <div class="dropdown relative sm:hidden"> <a class="dropdown-toggle w-5 h-5 block" href="javascript:;"> <i
                        data-feather="more-horizontal" class="w-5 h-5 text-gray-700"></i> </a>
            </div>
        </div>
        <form class="p-5 grid grid-cols-12 gap-4 row-gap-3" id="addCarousel" enctype="multipart/form-data">
            <div class="col-span-12 sm:col-span-12">
                <label>Title</label>
                <input required type="text" class="input w-full border mt-2 flex-1" name="judul"
                    placeholder="Carousel Title">
            </div>
            <div class="col-span-12 sm:col-span-12">
                <label>Carousel</label>
                <input type="file" class="input w-full border mt-2 flex-1" name="foto">
            </div>
            <div class="px-5 py-3 text-right border-t border-gray-200 flex">
                <button type="button" data-dismiss="modal" class="button w-20 border text-gray-700 mr-1">Cancel</button>
                <button type="submit" class="button w-20 bg-theme-1 text-white">Add</button>
            </div>
        </form>

        <!-- Delete Modal -->
        <div class="modal" id="deletePhotoModal">
            <div class="modal__content">
                <form id="deleteCarousel">
                    <input type="hidden" name="id_photo" id="id_photo">
                    <input type="hidden" name="judul_delete" id="judul_delete">
                    <div class="p-5 text-center"> <i data-feather="x-circle"
                            class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
                        <div class="text-3xl mt-5">Are you sure?</div>
                        <div class="text-gray-600 mt-2">Do you really want to delete these records? This
                            process cannot be undone.</div>
                    </div>
                    <div class="px-5 pb-8 text-center">
                        <button type="button" data-dismiss="modal"
                            class="button w-24 border text-gray-700 mr-1">Cancel</button>
                        <button type="submit" class="button w-24 bg-theme-6 text-white">Delete</button>
                </form>
            </div>
        </div>
    </div>

    <div class="modal" id="editCarouselModal">
        <div class="modal__content">
            <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
                <h2 class="font-medium text-bPhotoe mr-auto">Carousel</h2>
            </div>
            <form class="p-5 grid grid-cols-12 gap-4 row-gap-3" id="editCarousel" enctype="multipart/form-data">
                <input type="hidden" id="id_edit_image" name="id_edit_image">
                <input type="hidden" id="id_edit_content" name="id_edit_content">
                <div class="col-span-12 sm:col-span-12">
                    <div class="col-span-12 xl:col-span-4">
                        <div class="border border-gray-200 rounded-md p-5">
                            <div class="w-80 h-80 relative zoom-in mx-auto">
                                <img class="rounded-md" id="viewImageEdit" src="">
                            </div>
                            <div class="w-40 mx-auto relative mt-5">
                                <button type="button" class="cursor-pointer button w-full bg-theme-1 text-white ">Change
                                    Carousel</button>
                                <input type="file" name="editImage"
                                    class="changePhoto w-full h-full top-0 left-0 absolute opacity-0">
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-12">
                        <label>Title</label>
                        <input required type="text" id="edit_title" class="input w-full border mt-2 flex-1"
                            name="edit_title" placeholder="Carousel Title">
                    </div>
                </div>
                <div class="px-5 py-3 text-right border-t border-gray-200 flex">
                    <button type="button" data-dismiss="modal"
                        class="button w-20 border text-gray-700 mr-1">Cancel</button>
                    <button type="submit" class="button w-20 bg-theme-1 text-white">Save</button>
                </div>
            </form>
        </div>
    </div>
