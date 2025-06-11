<x-app-layout>
    <!-- BEGIN #content -->
    <div id="content" class="app-content">
        <!-- BEGIN container -->
        <div class="container">
            <!-- BEGIN row -->
            <div class="row justify-content-center">
                <!-- BEGIN col-10 -->
                <div class="col-xl-10">
                    <!-- BEGIN row -->
                    <div class="row">
                        <!-- BEGIN col-9 -->
                        <div class="col-xl-9">
                            <!-- BEGIN #general -->
                            <div id="general" class="mb-5">
                                <h4 class="d-flex align-items-center mb-1">
                                    <iconify-icon icon="solar:user-outline"
                                                  class="text-white text-opacity-50 fs-18px me-2 my-n2"></iconify-icon>
                                    General
                                </h4>
                                <p class="text-white text-opacity-50 small">View and update your general account
                                    information and settings.</p>
                                <div class="card">
                                    <div class="card-body d-flex align-items-center">
                                        <div class="flex-fill">
                                            <div class="text-white text-opacity-50">Name</div>
                                            <div class="text-white">Sean Ngu</div>
                                        </div>
                                        <div>
                                            <a href="#modalEdit" data-bs-toggle="modal"
                                               class="btn btn-outline-theme btn-sm w-80px">Edit</a>
                                        </div>
                                    </div>
                                    <div class="card-body d-flex align-items-center">
                                        <div class="flex-fill">
                                            <div class="text-white text-opacity-50">Username</div>
                                            <div class="text-white">@seantheme</div>
                                        </div>
                                        <div>
                                            <a href="#modalEdit" data-bs-toggle="modal"
                                               class="btn btn-outline-theme btn-sm w-80px">Edit</a>
                                        </div>
                                    </div>
                                    <div class="card-body d-flex align-items-center">
                                        <div class="flex-fill">
                                            <div class="text-white text-opacity-50">Phone</div>
                                            <div class="text-white">+1-202-555-0183</div>
                                        </div>
                                        <div>
                                            <a href="#modalEdit" data-bs-toggle="modal"
                                               class="btn btn-outline-theme btn-sm w-80px">Edit</a>
                                        </div>
                                    </div>
                                    <div class="card-body d-flex align-items-center">
                                        <div class="flex-fill">
                                            <div class="text-white text-opacity-50">Email address</div>
                                            <div class="text-white"><a
                                                    href="https://seantheme.com/cdn-cgi/l/email-protection"
                                                    class="__cf_email__"
                                                    data-cfemail="e3909693938c9197a3909796878a8cce9095868f9786cd808c8e">[email&#160;protected]</a>
                                            </div>
                                        </div>
                                        <div>
                                            <a href="#modalEdit" data-bs-toggle="modal"
                                               class="btn btn-outline-theme btn-sm w-80px">Edit</a>
                                        </div>
                                    </div>
                                    <div class="card-body d-flex align-items-center">
                                        <div class="flex-fill">
                                            <div class="text-white text-opacity-50">Password</div>
                                        </div>
                                        <div>
                                            <a href="#modalEdit" data-bs-toggle="modal"
                                               class="btn btn-outline-theme btn-sm w-80px">Edit</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END #general -->

                            <!-- BEGIN #notifications -->
                            <div id="notifications" class="mb-5">
                                <h4 class="d-flex align-items-center mb-1">
                                    <iconify-icon icon="solar:notification-unread-lines-outline"
                                                  class="text-white text-opacity-50 fs-18px me-2 my-n2"></iconify-icon>
                                    Notifications
                                </h4>
                                <p class="text-white text-opacity-50 small">Enable or disable what notifications you
                                    want to receive.</p>
                                <div class="card">
                                    <div class="card-body d-flex align-items-center">
                                        <div class="flex-fill">
                                            <div class="text-white text-opacity-50">Comments</div>
                                            <div class="text-white d-flex align-items-center">
                                                <i class="fa fa-circle fs-4px fa-fw text-success me-2"></i> Enabled
                                                (Push, SMS)
                                            </div>
                                        </div>
                                        <div>
                                            <a href="#modalEdit" data-bs-toggle="modal"
                                               class="btn btn-outline-theme btn-sm w-80px">Edit</a>
                                        </div>
                                    </div>
                                    <div class="card-body d-flex align-items-center">
                                        <div class="flex-fill">
                                            <div class="text-white text-opacity-50">Tags</div>
                                            <div class="text-white d-flex align-items-center">
                                                <i class="fa fa-circle fs-4px fa-fw text-white text-opacity-25 me-2"></i>
                                                Disabled
                                            </div>
                                        </div>
                                        <div>
                                            <a href="#modalEdit" data-bs-toggle="modal"
                                               class="btn btn-outline-theme btn-sm w-80px">Edit</a>
                                        </div>
                                    </div>
                                    <div class="card-body d-flex align-items-center">
                                        <div class="flex-fill">
                                            <div class="text-white text-opacity-50">Reminders</div>
                                            <div class="text-white d-flex align-items-center">
                                                <i class="fa fa-circle fs-4px fa-fw text-success me-2"></i> Enabled
                                                (Push, Email, SMS)
                                            </div>
                                        </div>
                                        <div>
                                            <a href="#modalEdit" data-bs-toggle="modal"
                                               class="btn btn-outline-theme btn-sm w-80px">Edit</a>
                                        </div>
                                    </div>
                                    <div class="card-body d-flex align-items-center">
                                        <div class="flex-fill">
                                            <div class="text-white text-opacity-50">New orders</div>
                                            <div class="text-white d-flex align-items-center">
                                                <i class="fa fa-circle fs-4px fa-fw text-success me-2"></i> Enabled
                                                (Push, Email, SMS)
                                            </div>
                                        </div>
                                        <div>
                                            <a href="#modalEdit" data-bs-toggle="modal"
                                               class="btn btn-outline-theme btn-sm w-80px">Edit</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END #notifications -->

                            <!-- BEGIN #privacyAndSecurity -->
                            <div id="privacyAndSecurity" class="mb-5">
                                <h4 class="d-flex align-items-center mb-1">
                                    <iconify-icon icon="solar:shield-network-outline"
                                                  class="text-white text-opacity-50 fs-18px me-2 my-n2"></iconify-icon>
                                    Privacy and security
                                </h4>
                                <p class="text-white text-opacity-50 small">Limit the account visibility and the
                                    security settings for your website.</p>
                                <div class="card">
                                    <div class="card-body d-flex align-items-center">
                                        <div class="flex-fill">
                                            <div class="text-white text-opacity-50">Who can see your future posts?</div>
                                            <div class="text-white d-flex align-items-center">
                                                Friends only
                                            </div>
                                        </div>
                                        <div>
                                            <a href="#modalEdit" data-bs-toggle="modal"
                                               class="btn btn-outline-theme btn-sm w-80px">Edit</a>
                                        </div>
                                    </div>
                                    <div class="card-body d-flex align-items-center">
                                        <div class="flex-fill">
                                            <div class="text-white text-opacity-50">Photo tagging</div>
                                            <div class="text-white d-flex align-items-center">
                                                <i class="fa fa-circle fs-4px fa-fw text-success me-2"></i> Enabled
                                            </div>
                                        </div>
                                        <div>
                                            <a href="#modalEdit" data-bs-toggle="modal"
                                               class="btn btn-outline-theme btn-sm w-80px">Edit</a>
                                        </div>
                                    </div>
                                    <div class="card-body d-flex align-items-center">
                                        <div class="flex-fill">
                                            <div class="text-white text-opacity-50">Location information</div>
                                            <div class="text-white d-flex align-items-center">
                                                <i class="fa fa-circle fs-4px fa-fw text-white text-opacity-25 me-2"></i>
                                                Disabled
                                            </div>
                                        </div>
                                        <div>
                                            <a href="#modalEdit" data-bs-toggle="modal"
                                               class="btn btn-outline-theme btn-sm w-80px">Edit</a>
                                        </div>
                                    </div>
                                    <div class="card-body d-flex align-items-center">
                                        <div class="flex-fill">
                                            <div class="text-white text-opacity-50">Firewall</div>
                                            <div class="text-white d-block d-xl-flex align-items-center">
                                                <div class="d-flex align-items-center"><i
                                                        class="fa fa-circle fs-4px fa-fw text-white text-opacity-25 me-2"></i>
                                                    Disabled
                                                </div>
                                                <span
                                                    class="bg-warning bg-opacity-10 text-warning ms-xl-3 mt-1 d-inline-block mt-xl-0 px-1">
														<i class="fa fa-exclamation-circle text-warning fs-12px me-1"></i>
														<span class="text-warning">Please enable the firewall for your website</span>
													</span>
                                            </div>
                                        </div>
                                        <div>
                                            <a href="#modalEdit" data-bs-toggle="modal"
                                               class="btn btn-outline-theme btn-sm w-80px">Edit</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END #privacyAndSecurity -->

                            <!-- BEGIN #payment -->
                            <div id="payment" class="mb-5">
                                <h4 class="d-flex align-items-center mb-1">
                                    <iconify-icon icon="solar:card-2-outline"
                                                  class="text-white text-opacity-50 fs-18px me-2 my-n2"></iconify-icon>
                                    Payment
                                </h4>
                                <p class="text-white text-opacity-50 small">Manage your website payment provider</p>
                                <div class="card">
                                    <div class="card-body d-flex align-items-center">
                                        <div class="flex-fill">
                                            <div class="text-white text-opacity-50">Allowed payment method</div>
                                            <div class="text-white">
                                                Paypal, Credit Card, Apple Pay, Amazon Pay, Google Wallet, Alipay,
                                                Wechatpay
                                            </div>
                                        </div>
                                        <div>
                                            <a href="#modalEdit" data-bs-toggle="modal"
                                               class="btn btn-outline-theme btn-sm w-80px">Edit</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END #payment -->

                            <!-- BEGIN #shipping -->
                            <div id="shipping" class="mb-5">
                                <h4 class="d-flex align-items-center mb-1">
                                    <iconify-icon icon="solar:box-outline"
                                                  class="text-white text-opacity-50 fs-18px me-2 my-n2"></iconify-icon>
                                    Shipping
                                </h4>
                                <p class="text-white text-opacity-50 small">Allowed shipping area and zone setting</p>
                                <div class="card">
                                    <div class="card-body d-flex align-items-center">
                                        <div class="flex-fill">
                                            <div class="text-white text-opacity-50">Allowed shipping method</div>
                                            <div class="text-white">Local, Domestic</div>
                                        </div>
                                        <div>
                                            <a href="#modalEdit" data-bs-toggle="modal"
                                               class="btn btn-outline-theme btn-sm w-80px">Edit</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END #shipping -->

                            <!-- BEGIN #mediaAndFiles -->
                            <div id="mediaAndFiles" class="mb-5">
                                <h4 class="d-flex align-items-center mb-1">
                                    <iconify-icon icon="solar:folder-with-files-outline"
                                                  class="text-white text-opacity-50 fs-18px me-2 my-n2"></iconify-icon>
                                    Media and Files
                                </h4>
                                <p class="text-white text-opacity-50 small">Allowed files and media format upload
                                    setting</p>
                                <div class="card">
                                    <div class="card-body d-flex align-items-center">
                                        <div class="flex-fill">
                                            <div class="text-white text-opacity-50">Allowed files and media format</div>
                                            <div class="text-white">.png, .jpg, .gif, .mp4</div>
                                        </div>
                                        <div>
                                            <a href="#modalEdit" data-bs-toggle="modal"
                                               class="btn btn-outline-theme btn-sm w-80px">Edit</a>
                                        </div>
                                    </div>
                                    <div class="card-body d-flex align-items-center">
                                        <div class="flex-fill">
                                            <div class="text-white text-opacity-50">Media and files cdn</div>
                                            <div class="text-white d-flex align-items-center">
                                                <i class="fa fa-circle fs-4px fa-fw text-white text-opacity-25 me-2"></i>
                                                Disabled
                                            </div>
                                        </div>
                                        <div>
                                            <a href="#modalEdit" data-bs-toggle="modal"
                                               class="btn btn-outline-theme btn-sm w-80px">Edit</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END #mediaAndFiles -->

                            <!-- BEGIN #languages -->
                            <div id="languages" class="mb-5">
                                <h4 class="d-flex align-items-center mb-1">
                                    <iconify-icon icon="solar:global-outline"
                                                  class="text-white text-opacity-50 fs-18px me-2 my-n2"></iconify-icon>
                                    Languages
                                </h4>
                                <p class="text-white text-opacity-50 small">Language font support and auto translation
                                    enabled</p>
                                <div class="card">
                                    <div class="card-body d-flex align-items-center">
                                        <div class="flex-fill">
                                            <div class="text-white text-opacity-50">Language enabled</div>
                                            <div class="text-white">English (default), Chinese, France, Portuguese,
                                                Japense
                                            </div>
                                        </div>
                                        <div>
                                            <a href="#modalEdit" data-bs-toggle="modal"
                                               class="btn btn-outline-theme btn-sm w-80px">Edit</a>
                                        </div>
                                    </div>
                                    <div class="card-body d-flex align-items-center">
                                        <div class="flex-fill">
                                            <div class="text-white text-opacity-50">Auto translation</div>
                                            <div class="text-white d-flex align-items-center">
                                                <i class="fa fa-circle fs-4px fa-fw text-success me-2"></i> Enabled
                                            </div>
                                        </div>
                                        <div>
                                            <a href="#modalEdit" data-bs-toggle="modal"
                                               class="btn btn-outline-theme btn-sm w-80px">Edit</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END #languages -->

                            <!-- BEGIN #system -->
                            <div id="system" class="mb-5">
                                <h4 class="d-flex align-items-center mb-1">
                                    <iconify-icon icon="solar:settings-outline"
                                                  class="text-white text-opacity-50 fs-18px me-2 my-n2"></iconify-icon>
                                    System
                                </h4>
                                <p class="text-white text-opacity-50 small">System storage, bandwidth and database
                                    setting</p>
                                <div class="card">
                                    <div class="card-body d-flex align-items-center">
                                        <div class="flex-fill">
                                            <div class="text-white text-opacity-50">Web storage</div>
                                            <div class="text-white">40.8gb / 100gb</div>
                                        </div>
                                        <div>
                                            <a href="#modalEdit" data-bs-toggle="modal"
                                               class="btn btn-outline-theme btn-sm w-80px">Manage</a>
                                        </div>
                                    </div>
                                    <div class="card-body d-flex align-items-center">
                                        <div class="flex-fill">
                                            <div class="text-white text-opacity-50">Monthly bandwidth</div>
                                            <div class="text-white">Unlimited</div>
                                        </div>
                                    </div>
                                    <div class="card-body d-flex align-items-center">
                                        <div class="flex-fill">
                                            <div class="text-white text-opacity-50">Database</div>
                                            <div class="text-white">MySQL version 8.0.19</div>
                                        </div>
                                        <div>
                                            <a href="#modalEdit" data-bs-toggle="modal"
                                               class="btn btn-sm btn-success opacity-3 w-80px disabled">Update</a>
                                        </div>
                                    </div>
                                    <div class="card-body d-flex align-items-center">
                                        <div class="flex-fill">
                                            <div class="text-white text-opacity-50">Platform</div>
                                            <div class="text-white">PHP 7.4.4, NGINX 1.17.0</div>
                                        </div>
                                        <div>
                                            <a href="#modalEdit" data-bs-toggle="modal"
                                               class="btn btn-sm btn-success w-80px">Update</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END #system -->

                            <!-- BEGIN #resetSettings -->
                            <div id="resetSettings" class="mb-5">
                                <h4 class="d-flex align-items-center mb-1">
                                    <iconify-icon icon="solar:refresh-outline"
                                                  class="text-white text-opacity-50 fs-18px me-2 my-n2"></iconify-icon>
                                    Reset settings
                                </h4>
                                <p class="text-white text-opacity-50 small">Reset all website setting to factory default
                                    setting.</p>
                                <div class="card">
                                    <div class="card-body d-flex align-items-center">
                                        <div class="flex-fill">
                                            <div class="text-white text-opacity-50">Reset Settings</div>
                                            <div class="text-white">This action will clear and reset all the current
                                                website setting.
                                            </div>
                                        </div>
                                        <div>
                                            <a href="#" class="btn btn-sm btn-white w-80px">Reset</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END #resetSettings -->
                        </div>
                        <!-- END col-9-->
                        <!-- BEGIN col-3 -->
                        <div class="col-xl-3">
                            <!-- BEGIN #sidebar-bootstrap -->
                            <nav id="sidebar-bootstrap" class="navbar navbar-sticky d-none d-xl-block">
                                <nav class="nav">
                                    <a class="nav-link" href="#general" data-bs-toggle="scroll-to">General</a>
                                    <a class="nav-link" href="#notifications"
                                       data-bs-toggle="scroll-to">Notifications</a>
                                    <a class="nav-link" href="#privacyAndSecurity" data-bs-toggle="scroll-to">Privacy
                                        and security</a>
                                    <a class="nav-link" href="#payment" data-bs-toggle="scroll-to">Payment</a>
                                    <a class="nav-link" href="#shipping" data-bs-toggle="scroll-to">Shipping</a>
                                    <a class="nav-link" href="#mediaAndFiles" data-bs-toggle="scroll-to">Media and
                                        Files</a>
                                    <a class="nav-link" href="#languages" data-bs-toggle="scroll-to">Languages</a>
                                    <a class="nav-link" href="#system" data-bs-toggle="scroll-to">System</a>
                                    <a class="nav-link" href="#resetSettings" data-bs-toggle="scroll-to">Reset
                                        settings</a>
                                </nav>
                            </nav>
                            <!-- END #sidebar-bootstrap -->
                        </div>
                        <!-- END col-3 -->
                    </div>
                    <!-- END row -->
                </div>
                <!-- END col-10 -->
            </div>
            <!-- END row -->
        </div>
        <!-- END container -->
    </div>
    <!-- END #content -->
</x-app-layout>
