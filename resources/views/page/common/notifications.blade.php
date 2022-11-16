@extends('layouts.app')
@section('content')

<div class="content">

    <div class="intro-x notification-content__box dropdown-content p-5 mt-4">
        <div class="intro-y flex items-center mt-4 mb-4">
            <h1 class="text-lg font-medium mr-auto">
                Notifications
            </h1>
        </div>
    
        @forelse ($notifications as $note)
        <div class="cursor-pointer relative flex items-center p-3">
            <div class="w-12 h-12 flex-none image-fit mr-1">
                <img alt="{{ $note->data['name'] }}" class="rounded-full" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRQ00PRm15u1lOv65dmayn_Y3UX2szglLK-3A&usqp=CAU">
                {{-- <div class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white"></div> --}}
            </div>
            <div class="ml-2 overflow-hidden">
                <div class="flex items-center">
                    <a href="javascript:;" class="font-medium truncate mr-5">{{ $note->data['name'] }}</a> 
                    <div class="text-xs text-slate-400 ml-auto whitespace-nowrap">{{ $note->created_at->toFormattedDateString() }}</div>
                </div>
                <div class="w-full truncate text-slate-500 mt-0.5">{{ $note->data['message'] }}</div>
            </div>
        </div> 
        @empty
            
        @endforelse

        
    </div>

    @if(Auth::user()->role == 'admin' && Auth::user()->type == '_super')
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-6">
            <!-- BEGIN: Basic Notification -->
            <div class="intro-y box">
                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">
                        Basic Notification
                    </h2>
                    <div class="form-check form-switch w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0">
                        <label class="form-check-label ml-0" for="show-example-1">Show example code</label>
                        <input id="show-example-1" data-target="#basic-textual-notification" class="show-code form-check-input mr-0 ml-3" type="checkbox">
                    </div>
                </div>
                <div id="basic-textual-notification" class="p-5">
                    <div class="preview">
                        <div class="text-center">
                            <!-- BEGIN: Notification Content -->
                            <div id="basic-non-sticky-notification-content" class="toastify-content hidden flex flex-col sm:flex-row">
                                <div class="font-medium">Yay! Updates Published!</div>
                                <a class="font-medium text-primary dark:text-slate-400 mt-1 sm:mt-0 sm:ml-40" href="">Review Changes</a> 
                            </div>
                            <!-- END: Notification Content -->
                            <!-- BEGIN: Notification Toggle -->
                            <button id="basic-non-sticky-notification-toggle" class="btn btn-primary mr-1">Show Non Sticky Notification</button>
                            <button id="basic-sticky-notification-toggle" class="btn btn-primary mt-2 sm:mt-0">Show Sticky Notification</button>
                            <!-- END: Notification Toggle -->
                        </div>
                    </div>
                    <div class="source-code hidden">
                        <button data-target="#copy-basic-textual-notification-html" class="copy-code btn py-1 px-2 btn-outline-secondary"> <i data-lucide="file" class="w-4 h-4 mr-2"></i> Copy example code </button>
                        <div class="overflow-y-auto mt-3 rounded-md">
                            <pre id="copy-basic-textual-notification-html" class="source-preview"> <code class="html"> HTMLOpenTag!-- BEGIN: Notification Content --HTMLCloseTag HTMLOpenTagdiv id=&quot;basic-non-sticky-notification-content&quot; class=&quot;toastify-content hidden flex&quot;HTMLCloseTag HTMLOpenTagdiv class=&quot;font-medium&quot;HTMLCloseTagYay! Updates Published!HTMLOpenTag/divHTMLCloseTag HTMLOpenTaga class=&quot;font-medium text-primary dark:text-slate-400 mt-1 sm:mt-0 sm:ml-40&quot; href=&quot;&quot;HTMLCloseTagReview ChangesHTMLOpenTag/aHTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTag!-- END: Notification Content --HTMLCloseTag HTMLOpenTag!-- BEGIN: Notification Toggle --HTMLCloseTag HTMLOpenTagbutton id=&quot;basic-non-sticky-notification-toggle&quot; class=&quot;btn btn-primary mr-1&quot;HTMLCloseTagShow Non Sticky NotificationHTMLOpenTag/buttonHTMLCloseTag HTMLOpenTagbutton id=&quot;basic-sticky-notification-toggle&quot; class=&quot;btn btn-primary mt-2 sm:mt-0&quot;HTMLCloseTagShow Sticky NotificationHTMLOpenTag/buttonHTMLCloseTag HTMLOpenTag!-- END: Notification Toggle --HTMLCloseTag </code> </pre>
                        </div>
                        <button data-target="#copy-basic-textual-notification-js" class="copy-code btn py-1 px-2 btn-outline-secondary mt-5"> <i data-lucide="file" class="w-4 h-4 mr-2"></i> Copy example code </button>
                        <div class="overflow-y-auto mt-3 rounded-md">
                            <pre id="copy-basic-textual-notification-js" class="source-preview"> <code class="javascript"> // Basic non sticky notification $(&quot;#basic-non-sticky-notification-toggle&quot;).on(&quot;click&quot;, function () { Toastify({ node: $(&quot;#basic-non-sticky-notification-content&quot;) .clone() .removeClass(&quot;hidden&quot;)[0], duration: 3000, newWindow: true, close: true, gravity: &quot;top&quot;, position: &quot;right&quot;, backgroundColor: &quot;white&quot;, stopOnFocus: true, }).showToast(); }); // Basic sticky notification $(&quot;#basic-sticky-notification-toggle&quot;).on(&quot;click&quot;, function () { Toastify({ node: $(&quot;#basic-non-sticky-notification-content&quot;) .clone() .removeClass(&quot;hidden&quot;)[0], duration: -1, newWindow: true, close: true, gravity: &quot;top&quot;, position: &quot;right&quot;, backgroundColor: &quot;white&quot;, stopOnFocus: true, }).showToast(); }); </code> </pre>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Basic Notification -->
            <!-- BEGIN: Success Notification -->
            <div class="intro-y box mt-5">
                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">
                        Success Notification
                    </h2>
                    <div class="form-check form-switch w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0">
                        <label class="form-check-label ml-0" for="show-example-2">Show example code</label>
                        <input id="show-example-2" data-target="#success-notification" class="show-code form-check-input mr-0 ml-3" type="checkbox">
                    </div>
                </div>
                <div id="success-notification" class="p-5">
                    <div class="preview">
                        <div class="text-center">
                            <!-- BEGIN: Notification Content -->
                            <div id="success-notification-content" class="toastify-content hidden flex">
                                <i class="text-success" data-lucide="check-circle"></i> 
                                <div class="ml-4 mr-4">
                                    <div class="font-medium">Message Saved!</div>
                                    <div class="text-slate-500 mt-1">The message will be sent in 5 minutes.</div>
                                </div>
                            </div>
                            <!-- END: Notification Content -->
                            <!-- BEGIN: Notification Toggle -->
                            <button id="success-notification-toggle" class="btn btn-primary">Show Notification</button>
                            <!-- END: Notification Toggle -->
                        </div>
                    </div>
                    <div class="source-code hidden">
                        <button data-target="#copy-success-notification-html" class="copy-code btn py-1 px-2 btn-outline-secondary"> <i data-lucide="file" class="w-4 h-4 mr-2"></i> Copy example code </button>
                        <div class="overflow-y-auto mt-3 rounded-md">
                            <pre id="copy-success-notification-html" class="source-preview"> <code class="html"> HTMLOpenTag!-- BEGIN: Notification Content --HTMLCloseTag HTMLOpenTagdiv id=&quot;success-notification-content&quot; class=&quot;toastify-content hidden flex&quot;HTMLCloseTag HTMLOpenTagi class=&quot;text-success&quot; data-lucide=&quot;check-circle&quot;HTMLCloseTagHTMLOpenTag/iHTMLCloseTag HTMLOpenTagdiv class=&quot;ml-4 mr-4&quot;HTMLCloseTag HTMLOpenTagdiv class=&quot;font-medium&quot;HTMLCloseTagMessage Saved!HTMLOpenTag/divHTMLCloseTag HTMLOpenTagdiv class=&quot;text-slate-500 mt-1&quot;HTMLCloseTagThe message will be sent in 5 minutes.HTMLOpenTag/divHTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTag!-- END: Notification Content --HTMLCloseTag HTMLOpenTag!-- BEGIN: Notification Toggle --HTMLCloseTag HTMLOpenTagbutton id=&quot;success-notification-toggle&quot; class=&quot;btn btn-primary&quot;HTMLCloseTagShow NotificationHTMLOpenTag/buttonHTMLCloseTag HTMLOpenTag!-- END: Notification Toggle --HTMLCloseTag </code> </pre>
                        </div>
                        <button data-target="#copy-success-notification-js" class="copy-code btn py-1 px-2 btn-outline-secondary mt-5"> <i data-lucide="file" class="w-4 h-4 mr-2"></i> Copy example code </button>
                        <div class="overflow-y-auto mt-3 rounded-md">
                            <pre id="copy-success-notification-js" class="source-preview"> <code class="javascript"> // Success notification $(&quot;#success-notification-toggle&quot;).on(&quot;click&quot;, function () { Toastify({ node: $(&quot;#success-notification-content&quot;) .clone() .removeClass(&quot;hidden&quot;)[0], duration: -1, newWindow: true, close: true, gravity: &quot;top&quot;, position: &quot;right&quot;, stopOnFocus: true, }).showToast(); }); </code> </pre>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Success Notification -->
            <!-- BEGIN: Notification With Actions -->
            <div class="intro-y box mt-5">
                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">
                        Notification With Actions
                    </h2>
                    <div class="form-check form-switch w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0">
                        <label class="form-check-label ml-0" for="show-example-3">Show example code</label>
                        <input id="show-example-3" data-target="#notification-with-actions" class="show-code form-check-input mr-0 ml-3" type="checkbox">
                    </div>
                </div>
                <div id="notification-with-actions" class="p-5">
                    <div class="preview">
                        <div class="text-center">
                            <!-- BEGIN: Notification Content -->
                            <div id="notification-with-actions-content" class="toastify-content hidden flex">
                                <i data-lucide="hard-drive"></i> 
                                <div class="ml-4 mr-4">
                                    <div class="font-medium">Storage Removed!</div>
                                    <div class="text-slate-500 mt-1">
                                        The server will restart in 30 seconds, don't make
                                        <br>
                                        changes during the update process!
                                    </div>
                                    <div class="font-medium flex mt-1.5"> <a class="text-primary dark:text-slate-400" href="">Restart Now</a> <a class="text-slate-500 ml-3" href="">Cancel</a> </div>
                                </div>
                            </div>
                            <!-- END: Notification Content -->
                            <!-- BEGIN: Notification Toggle -->
                            <button id="notification-with-actions-toggle" class="btn btn-primary">Show Notification</button>
                            <!-- END: Notification Toggle -->
                        </div>
                    </div>
                    <div class="source-code hidden">
                        <button data-target="#copy-notification-with-actions-html" class="copy-code btn py-1 px-2 btn-outline-secondary"> <i data-lucide="file" class="w-4 h-4 mr-2"></i> Copy example code </button>
                        <div class="overflow-y-auto mt-3 rounded-md">
                            <pre id="copy-notification-with-actions-html" class="source-preview"> <code class="html"> HTMLOpenTag!-- BEGIN: Notification Content --HTMLCloseTag HTMLOpenTagdiv id=&quot;notification-with-actions-content&quot; class=&quot;toastify-content hidden flex&quot;HTMLCloseTag HTMLOpenTagi data-lucide=&quot;hard-drive&quot;HTMLCloseTagHTMLOpenTag/iHTMLCloseTag HTMLOpenTagdiv class=&quot;ml-4 mr-4&quot;HTMLCloseTag HTMLOpenTagdiv class=&quot;font-medium&quot;HTMLCloseTagStorage Removed!HTMLOpenTag/divHTMLCloseTag HTMLOpenTagdiv class=&quot;text-slate-500 mt-1&quot;HTMLCloseTagThe server will restart in 30 seconds, don&#039;t makeHTMLOpenTagbrHTMLCloseTag changes during the update process!HTMLOpenTag/divHTMLCloseTag HTMLOpenTagdiv class=&quot;font-medium flex mt-1.5&quot;HTMLCloseTag HTMLOpenTaga class=&quot;text-primary dark:text-slate-400&quot; href=&quot;&quot;HTMLCloseTagRestart NowHTMLOpenTag/aHTMLCloseTag HTMLOpenTaga class=&quot;text-slate-500 ml-3&quot; href=&quot;&quot;HTMLCloseTagCancelHTMLOpenTag/aHTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTag!-- END: Notification Content --HTMLCloseTag HTMLOpenTag!-- BEGIN: Notification Toggle --HTMLCloseTag HTMLOpenTagbutton id=&quot;notification-with-actions-toggle&quot; class=&quot;btn btn-primary&quot;HTMLCloseTagShow NotificationHTMLOpenTag/buttonHTMLCloseTag HTMLOpenTag!-- END: Notification Toggle --HTMLCloseTag </code> </pre>
                        </div>
                        <button data-target="#copy-notification-with-actions-js" class="copy-code btn py-1 px-2 btn-outline-secondary mt-5"> <i data-lucide="file" class="w-4 h-4 mr-2"></i> Copy example code </button>
                        <div class="overflow-y-auto mt-3 rounded-md">
                            <pre id="copy-notification-with-actions-js" class="source-preview"> <code class="javascript"> // Notification with actions $(&quot;#notification-with-actions-toggle&quot;).on(&quot;click&quot;, function () { Toastify({ node: $(&quot;#notification-with-actions-content&quot;) .clone() .removeClass(&quot;hidden&quot;)[0], duration: -1, newWindow: true, close: true, gravity: &quot;top&quot;, position: &quot;right&quot;, stopOnFocus: true, }).showToast(); }); </code> </pre>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="intro-y col-span-12 lg:col-span-6">
            <!-- END: Notification With Actions -->
            <!-- BEGIN: Notification With Avatar -->
            <div class="intro-y box">
                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">
                        Notification With Avatar
                    </h2>
                    <div class="form-check form-switch w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0">
                        <label class="form-check-label ml-0" for="show-example-4">Show example code</label>
                        <input id="show-example-4" data-target="#notification-with-avatar" class="show-code form-check-input mr-0 ml-3" type="checkbox">
                    </div>
                </div>
                <div id="notification-with-avatar" class="p-5">
                    <div class="preview">
                        <div class="text-center">
                            <!-- BEGIN: Notification Content -->
                            <div id="notification-with-avatar-content" class="toastify-content hidden flex">
                                <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden">
                                    <img alt="Midone - HTML Admin Template" src="dist/images/profile-9.jpg">
                                </div>
                                <div class="ml-4 sm:mr-28">
                                    <div class="font-medium">Tom Cruise</div>
                                    <div class="text-slate-500 mt-1">See you later! 😃😃😃</div>
                                </div>
                                <a data-dismiss="notification" class="absolute top-0 bottom-0 right-0 flex items-center px-6 border-l border-slate-200/60 dark:border-darkmode-400 font-medium text-primary dark:text-slate-400" href="javascript:;">Reply</a> 
                            </div>
                            <!-- END: Notification Content -->
                            <!-- BEGIN: Notification Toggle -->
                            <button id="notification-with-avatar-toggle" class="btn btn-primary">Show Notification</button>
                            <!-- END: Notification Toggle -->
                        </div>
                    </div>
                    <div class="source-code hidden">
                        <button data-target="#copy-notification-with-avatar-html" class="copy-code btn py-1 px-2 btn-outline-secondary"> <i data-lucide="file" class="w-4 h-4 mr-2"></i> Copy example code </button>
                        <div class="overflow-y-auto mt-3 rounded-md">
                            <pre id="copy-notification-with-avatar-html" class="source-preview"> <code class="html"> HTMLOpenTag!-- BEGIN: Notification Content --HTMLCloseTag HTMLOpenTagdiv id=&quot;notification-with-avatar-content&quot; class=&quot;toastify-content hidden flex&quot;HTMLCloseTag HTMLOpenTagdiv class=&quot;w-10 h-10 flex-none image-fit rounded-full overflow-hidden&quot;HTMLCloseTag HTMLOpenTagimg alt=&quot;Midone - HTML Admin Template&quot; src=&quot;dist/images/profile-9.jpg&quot;HTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTagdiv class=&quot;ml-4 sm:mr-28&quot;HTMLCloseTag HTMLOpenTagdiv class=&quot;font-medium&quot;HTMLCloseTagTom CruiseHTMLOpenTag/divHTMLCloseTag HTMLOpenTagdiv class=&quot;text-slate-500 mt-1&quot;HTMLCloseTagSee you later! 😃😃😃HTMLOpenTag/divHTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTaga data-dismiss=&quot;notification&quot; class=&quot;absolute top-0 bottom-0 right-0 flex items-center px-6 border-l border-slate-200/60 dark:border-darkmode-400 font-medium text-primary dark:text-slate-400&quot; href=&quot;javascript:;&quot;HTMLCloseTagReplyHTMLOpenTag/aHTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTag!-- END: Notification Content --HTMLCloseTag HTMLOpenTag!-- BEGIN: Notification Toggle --HTMLCloseTag HTMLOpenTagbutton id=&quot;notification-with-avatar-toggle&quot; class=&quot;btn btn-primary&quot;HTMLCloseTagShow NotificationHTMLOpenTag/buttonHTMLCloseTag HTMLOpenTag!-- END: Notification Toggle --HTMLCloseTag </code> </pre>
                        </div>
                        <button data-target="#copy-notification-with-avatar-js" class="copy-code btn py-1 px-2 btn-outline-secondary mt-5"> <i data-lucide="file" class="w-4 h-4 mr-2"></i> Copy example code </button>
                        <div class="overflow-y-auto mt-3 rounded-md">
                            <pre id="copy-notification-with-avatar-js" class="source-preview"> <code class="javascript"> // Notification with avatar $(&quot;#notification-with-avatar-toggle&quot;).on(&quot;click&quot;, function () { // Init toastify let avatarNotification = Toastify({ node: $(&quot;#notification-with-avatar-content&quot;) .clone() .removeClass(&quot;hidden&quot;)[0], duration: -1, newWindow: true, close: false, gravity: &quot;top&quot;, position: &quot;right&quot;, stopOnFocus: true, }).showToast(); // Close notification event $(avatarNotification.toastElement) .find(&#039;[data-dismiss=&quot;notification&quot;]&#039;) .on(&quot;click&quot;, function () { avatarNotification.hideToast(); }); }); </code> </pre>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Notification With Avatar -->
            <!-- BEGIN: Notification With Split Buttons -->
            <div class="intro-y box mt-5">
                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">
                        Notification With Split Buttons
                    </h2>
                    <div class="form-check form-switch w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0">
                        <label class="form-check-label ml-0" for="show-example-5">Show example code</label>
                        <input id="show-example-5" data-target="#notification-with-split-buttons" class="show-code form-check-input mr-0 ml-3" type="checkbox">
                    </div>
                </div>
                <div id="notification-with-split-buttons" class="p-5">
                    <div class="preview">
                        <div class="text-center">
                            <!-- BEGIN: Notification Content -->
                            <div id="notification-with-split-buttons-content" class="toastify-content hidden flex">
                                <div class="sm:mr-40">
                                    <div class="font-medium">Introducing new theme</div>
                                    <div class="text-slate-500 mt-1">Release version 2.3.3</div>
                                </div>
                                <div class="absolute top-0 bottom-0 right-0 flex flex-col border-l border-slate-200/60 dark:border-darkmode-400"> <a class="flex-1 flex items-center justify-center px-6 font-medium text-primary dark:text-slate-400 border-b border-slate-200/60 dark:border-darkmode-400" href="javascript:;">View Details</a> <a data-dismiss="notification" class="flex-1 flex items-center justify-center px-6 font-medium text-slate-500" href="javascript:;">Dismiss</a> </div>
                            </div>
                            <!-- END: Notification Content -->
                            <!-- BEGIN: Notification Toggle -->
                            <button id="notification-with-split-buttons-toggle" class="btn btn-primary">Show Notification</button>
                            <!-- END: Notification Toggle -->
                        </div>
                    </div>
                    <div class="source-code hidden">
                        <button data-target="#copy-notification-with-split-buttons-html" class="copy-code btn py-1 px-2 btn-outline-secondary"> <i data-lucide="file" class="w-4 h-4 mr-2"></i> Copy example code </button>
                        <div class="overflow-y-auto mt-3 rounded-md">
                            <pre id="copy-notification-with-split-buttons-html" class="source-preview"> <code class="html"> HTMLOpenTag!-- BEGIN: Notification Content --HTMLCloseTag HTMLOpenTagdiv id=&quot;notification-with-split-buttons-content&quot; class=&quot;toastify-content hidden flex&quot;HTMLCloseTag HTMLOpenTagdiv class=&quot;sm:mr-40&quot;HTMLCloseTag HTMLOpenTagdiv class=&quot;font-medium&quot;HTMLCloseTagIntroducing new themeHTMLOpenTag/divHTMLCloseTag HTMLOpenTagdiv class=&quot;text-slate-500 mt-1&quot;HTMLCloseTagRelease version 2.3.3HTMLOpenTag/divHTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTagdiv class=&quot;absolute top-0 bottom-0 right-0 flex flex-col border-l border-slate-200/60 dark:border-darkmode-400&quot;HTMLCloseTag HTMLOpenTaga class=&quot;flex-1 flex items-center justify-center px-6 font-medium text-primary dark:text-slate-400 border-b border-slate-200/60 dark:border-darkmode-400&quot; href=&quot;javascript:;&quot;HTMLCloseTagView DetailsHTMLOpenTag/aHTMLCloseTag HTMLOpenTaga data-dismiss=&quot;notification&quot; class=&quot;flex-1 flex items-center justify-center px-6 font-medium text-slate-500&quot; href=&quot;javascript:;&quot;HTMLCloseTagDismissHTMLOpenTag/aHTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTag!-- END: Notification Content --HTMLCloseTag HTMLOpenTag!-- BEGIN: Notification Toggle --HTMLCloseTag HTMLOpenTagbutton id=&quot;notification-with-split-buttons-toggle&quot; class=&quot;btn btn-primary&quot;HTMLCloseTagShow NotificationHTMLOpenTag/buttonHTMLCloseTag HTMLOpenTag!-- END: Notification Toggle --HTMLCloseTag </code> </pre>
                        </div>
                        <button data-target="#copy-notification-with-split-buttons-js" class="copy-code btn py-1 px-2 btn-outline-secondary mt-5"> <i data-lucide="file" class="w-4 h-4 mr-2"></i> Copy example code </button>
                        <div class="overflow-y-auto mt-3 rounded-md">
                            <pre id="copy-notification-with-split-buttons-js" class="source-preview"> <code class="javascript"> // Notification with split buttons $(&quot;#notification-with-split-buttons-toggle&quot;).on(&quot;click&quot;, function () { // Init toastify let splitButtonsNotification = Toastify({ node: $(&quot;#notification-with-split-buttons-content&quot;) .clone() .removeClass(&quot;hidden&quot;)[0], duration: -1, newWindow: true, close: false, gravity: &quot;top&quot;, position: &quot;right&quot;, stopOnFocus: true, }).showToast(); // Close notification event $(splitButtonsNotification.toastElement) .find(&#039;[data-dismiss=&quot;notification&quot;]&#039;) .on(&quot;click&quot;, function () { splitButtonsNotification.hideToast(); }); }); </code> </pre>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Notification With Split Buttons -->
            <!-- BEGIN: Notification With Buttons Below -->
            <div class="intro-y box mt-5">
                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">
                        Notification With Buttons Below
                    </h2>
                    <div class="form-check form-switch w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0">
                        <label class="form-check-label ml-0" for="show-example-6">Show example code</label>
                        <input id="show-example-6" data-target="#notification-with-buttons-below" class="show-code form-check-input mr-0 ml-3" type="checkbox">
                    </div>
                </div>
                <div id="notification-with-buttons-below" class="p-5">
                    <div class="preview">
                        <div class="text-center">
                            <!-- BEGIN: Notification Content -->
                            <div id="notification-with-buttons-below-content" class="toastify-content hidden flex">
                                <i data-lucide="file-text"></i> 
                                <div class="ml-4 mr-5 sm:mr-20">
                                    <div class="font-medium">Tom Cruise</div>
                                    <div class="text-slate-500 mt-1">Sent you new documents.</div>
                                    <div class="mt-2.5"> <a class="btn btn-primary py-1 px-2 mr-2" href="">Preview</a> <a class="btn btn-outline-secondary py-1 px-2" href="">Download</a> </div>
                                </div>
                            </div>
                            <!-- END: Notification Content -->
                            <!-- BEGIN: Notification Toggle -->
                            <button id="notification-with-buttons-below-toggle" class="btn btn-primary">Show Notification</button>
                            <!-- END: Notification Toggle -->
                        </div>
                    </div>
                    <div class="source-code hidden">
                        <button data-target="#copy-notification-with-buttons-below-html" class="copy-code btn py-1 px-2 btn-outline-secondary"> <i data-lucide="file" class="w-4 h-4 mr-2"></i> Copy example code </button>
                        <div class="overflow-y-auto mt-3 rounded-md">
                            <pre id="copy-notification-with-buttons-below-html" class="source-preview"> <code class="html"> HTMLOpenTag!-- BEGIN: Notification Content --HTMLCloseTag HTMLOpenTagdiv id=&quot;notification-with-buttons-below-content&quot; class=&quot;toastify-content hidden flex&quot;HTMLCloseTag HTMLOpenTagi data-lucide=&quot;file-text&quot;HTMLCloseTagHTMLOpenTag/iHTMLCloseTag HTMLOpenTagdiv class=&quot;ml-4 mr-5 sm:mr-20&quot;HTMLCloseTag HTMLOpenTagdiv class=&quot;font-medium&quot;HTMLCloseTagTom CruiseHTMLOpenTag/divHTMLCloseTag HTMLOpenTagdiv class=&quot;text-slate-500 mt-1&quot;HTMLCloseTagSent you new documents.HTMLOpenTag/divHTMLCloseTag HTMLOpenTagdiv class=&quot;mt-2.5&quot;HTMLCloseTag HTMLOpenTaga class=&quot;btn btn-primary py-1 px-2 mr-2&quot; href=&quot;&quot;HTMLCloseTagPreviewHTMLOpenTag/aHTMLCloseTag HTMLOpenTaga class=&quot;btn btn-outline-secondary py-1 px-2&quot; href=&quot;&quot;HTMLCloseTagDownloadHTMLOpenTag/aHTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTag!-- END: Notification Content --HTMLCloseTag HTMLOpenTag!-- BEGIN: Notification Toggle --HTMLCloseTag HTMLOpenTagbutton id=&quot;notification-with-buttons-below-toggle&quot; class=&quot;btn btn-primary&quot;HTMLCloseTagShow NotificationHTMLOpenTag/buttonHTMLCloseTag HTMLOpenTag!-- END: Notification Toggle --HTMLCloseTag </code> </pre>
                        </div>
                        <button data-target="#copy-notification-with-buttons-below-js" class="copy-code btn py-1 px-2 btn-outline-secondary mt-5"> <i data-lucide="file" class="w-4 h-4 mr-2"></i> Copy example code </button>
                        <div class="overflow-y-auto mt-3 rounded-md">
                            <pre id="copy-notification-with-buttons-below-js" class="source-preview"> <code class="javascript text-xs p-0 rounded-md html pl-5 pt-8 pb-4 -mb-10 -mt-10"> // Notification with buttons below $(&quot;#notification-with-buttons-below-toggle&quot;).on(&quot;click&quot;, function () { // Init toastify Toastify({ node: $(&quot;#notification-with-buttons-below-content&quot;) .clone() .removeClass(&quot;hidden&quot;)[0], duration: -1, newWindow: true, close: true, gravity: &quot;top&quot;, position: &quot;right&quot;, stopOnFocus: true, }).showToast(); }); </code> </pre>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Notification With Buttons Below -->
        </div>
    </div>
    @endif
</div>
@endsection