<div class="grid grid-cols-12 gap-6 mt-8">
    <div class="col-span-12">
        <h2 class="intro-y text-lg font-medium mr-auto mt-2">
            <?= $title; ?>
        </h2>
        <!-- BEGIN: Inbox Menu -->
        <!-- <div class="intro-y box bg-theme-1 p-5 mt-6">
            <button type="button"
                class="button button--lg flex items-center justify-center text-gray-700 w-full bg-white mt-2"> <svg
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-edit-3 w-4 h-4 mr-2">
                    <path d="M12 20h9"></path>
                    <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                </svg> Compose </button>
            <div class="border-t border-theme-3 mt-6 pt-6 text-white">
                <a href="" class="flex items-center px-3 py-2 rounded-md bg-theme-22 font-medium"> <svg
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-mail w-4 h-4 mr-2">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                        <polyline points="22,6 12,13 2,6"></polyline>
                    </svg> Inbox </a>
                <a href="" class="flex items-center px-3 py-2 mt-2 rounded-md"> <svg xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-star w-4 h-4 mr-2">
                        <polygon
                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                        </polygon>
                    </svg> Marked </a>
                <a href="" class="flex items-center px-3 py-2 mt-2 rounded-md"> <svg xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-inbox w-4 h-4 mr-2">
                        <polyline points="22 12 16 12 14 15 10 15 8 12 2 12"></polyline>
                        <path
                            d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z">
                        </path>
                    </svg> Draft </a>
                <a href="" class="flex items-center px-3 py-2 mt-2 rounded-md"> <svg xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-send w-4 h-4 mr-2">
                        <line x1="22" y1="2" x2="11" y2="13"></line>
                        <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                    </svg> Sent </a>
                <a href="" class="flex items-center px-3 py-2 mt-2 rounded-md"> <svg xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash w-4 h-4 mr-2">
                        <polyline points="3 6 5 6 21 6"></polyline>
                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                    </svg> Trash </a>
            </div>
            <div class="border-t border-theme-3 mt-5 pt-5 text-white">
                <a href="" class="flex items-center px-3 py-2 truncate">
                    <div class="w-2 h-2 bg-theme-11 rounded-full mr-3"></div>
                    Custom Work
                </a>
                <a href="" class="flex items-center px-3 py-2 mt-2 rounded-md truncate">
                    <div class="w-2 h-2 bg-theme-9 rounded-full mr-3"></div>
                    Important Meetings
                </a>
                <a href="" class="flex items-center px-3 py-2 mt-2 rounded-md truncate">
                    <div class="w-2 h-2 bg-theme-12 rounded-full mr-3"></div>
                    Work
                </a>
                <a href="" class="flex items-center px-3 py-2 mt-2 rounded-md truncate">
                    <div class="w-2 h-2 bg-theme-11 rounded-full mr-3"></div>
                    Design
                </a>
                <a href="" class="flex items-center px-3 py-2 mt-2 rounded-md truncate">
                    <div class="w-2 h-2 bg-theme-6 rounded-full mr-3"></div>
                    Next Week
                </a>
                <a href="" class="flex items-center px-3 py-2 mt-2 rounded-md truncate"> <svg
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-plus w-4 h-4 mr-2">
                        <line x1="12" y1="5" x2="12" y2="19"></line>
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg> Add New Label </a>
            </div>
        </div> -->
        <!-- END: Inbox Menu -->
    </div>
    <div class="col-span-12 ">
        <!-- BEGIN: Inbox Filter -->
        <div class="intro-y flex flex-col-reverse sm:flex-row items-center">
            <div class="w-full sm:w-auto relative mr-auto mt-3 sm:mt-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-search w-4 h-4 absolute my-auto inset-y-0 ml-3 left-0 z-10 text-gray-700">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
                <input type="text" class="input w-full sm:w-64 box px-10 text-gray-700 placeholder-theme-13"
                    placeholder="Search mail">
                <!-- <div class="inbox-filter dropdown absolute inset-y-0 mr-3 right-0 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-chevron-down dropdown-toggle w-4 h-4 cursor-pointer text-gray-700">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                    <div class="inbox-filter__dropdown-box dropdown-box mt-10 absolute top-0 left-0 z-20">
                        <div class="dropdown-box__content box p-5">
                            <div class="grid grid-cols-12 gap-4 row-gap-3">
                                <div class="col-span-6">
                                    <div class="text-xs">From</div>
                                    <input type="text" class="input w-full border mt-2 flex-1"
                                        placeholder="example@gmail.com">
                                </div>
                                <div class="col-span-6">
                                    <div class="text-xs">To</div>
                                    <input type="text" class="input w-full border mt-2 flex-1"
                                        placeholder="example@gmail.com">
                                </div>
                                <div class="col-span-6">
                                    <div class="text-xs">Subject</div>
                                    <input type="text" class="input w-full border mt-2 flex-1"
                                        placeholder="Important Meeting">
                                </div>
                                <div class="col-span-6">
                                    <div class="text-xs">Has the Words</div>
                                    <input type="text" class="input w-full border mt-2 flex-1"
                                        placeholder="Job, Work, Documentation">
                                </div>
                                <div class="col-span-6">
                                    <div class="text-xs">Doesn't Have</div>
                                    <input type="text" class="input w-full border mt-2 flex-1"
                                        placeholder="Job, Work, Documentation">
                                </div>
                                <div class="col-span-6">
                                    <div class="text-xs">Size</div>
                                    <select class="input w-full border mt-2 flex-1">
                                        <option>10</option>
                                        <option>25</option>
                                        <option>35</option>
                                        <option>50</option>
                                    </select>
                                </div>
                                <div class="col-span-12 flex items-center mt-3">
                                    <button
                                        class="button w-32 justify-center block bg-gray-200 text-gray-600 ml-auto">Create
                                        Filter</button>
                                    <button
                                        class="button w-32 justify-center block bg-theme-1 text-white ml-2">Search</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
            <!-- <div class="w-full sm:w-auto flex">
                <button class="button text-white bg-theme-1 shadow-md mr-2">Start a Video Call</button>
                <div class="dropdown relative">
                    <button class="dropdown-toggle button px-2 box text-gray-700">
                        <span class="w-5 h-5 flex items-center justify-center"> <svg xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-plus w-4 h-4">
                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg> </span>
                    </button>
                    <div class="dropdown-box mt-10 absolute w-40 top-0 right-0 z-20">
                        <div class="dropdown-box__content box p-2">
                            <a href=""
                                class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-user w-4 h-4 mr-2">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg> Contacts </a>
                            <a href=""
                                class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-settings w-4 h-4 mr-2">
                                    <circle cx="12" cy="12" r="3"></circle>
                                    <path
                                        d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z">
                                    </path>
                                </svg> Settings </a>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
        <!-- END: Inbox Filter -->
        <!-- BEGIN: Inbox Content -->
        <div class="intro-y inbox box mt-5">
            <div class="p-5 flex flex-col-reverse sm:flex-row text-gray-600 border-b border-gray-200">
                <div
                    class="flex items-center mt-3 sm:mt-0 border-t sm:border-0 border-gray-200 pt-5 sm:pt-0 mt-5 sm:mt-0 -mx-5 sm:mx-0 px-5 sm:px-0">
                    <input class="input border border-gray-500" type="checkbox" id="checkAll">
                    <label class="ml-2" for="checkAll">
                        Delete All
                    </label>
                    <a href="javascript:;" class="w-5 h-5 ml-5 flex items-center justify-center"> <svg
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-refresh-cw w-4 h-4">
                            <polyline points="23 4 23 10 17 10"></polyline>
                            <polyline points="1 20 1 14 7 14"></polyline>
                            <path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path>
                        </svg> </a>
                </div>
            </div>
            <div class="overflow-x-auto sm:overflow-x-visible">
                <?php foreach ($feedback as $f): ?>
                    <form id="table-form">
                        <div class="intro-y">
                            <div
                                class="inbox__item inbox__item--active inline-block sm:block text-gray-700 bg-gray-100 border-b border-gray-200">
                                <div class="flex px-5 py-3">
                                    <div class="w-56 flex-none flex items-center mr-10">
                                        <input name="checkbox_value[]" id="checkbox"
                                            class="input flex-none border border-gray-500" type="checkbox"
                                            value="<?= $f['id_saran']; ?>">
                                        <div class="inbox__item--sender truncate ml-3">
                                            <?= $f['email'] ?>
                                        </div>
                                    </div>
                                    <div class="w-64 sm:w-auto truncate">
                                        <?= $f['isi_saran'] ?>
                                    </div>
                                    <div class="inbox__item--time whitespace-no-wrap ml-auto pl-10">
                                        <?= $f['tanggal'] ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <div class="p-5 flex flex-col sm:flex-row items-center text-center sm:text-left text-gray-600">
                        <button type="submit" class="deleteAllBtn button w-10 bg-theme-6 text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-trash-2 w-4 h-4 mr-1">
                                <polyline points="3 6 5 6 21 6"></polyline>
                                <path
                                    d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                </path>
                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                <line x1="14" y1="11" x2="14" y2="17"></line>
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
            <!-- END: Inbox Content -->
        </div>
    </div>