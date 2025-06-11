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
                        <div class="col-xl-12">
                            <!-- BEGIN #general -->
                            <div id="general" class="mb-5">
                                <h4 class="d-flex align-items-center mb-1">
                                    <iconify-icon icon="solar:user-outline"
                                                  class="text-white text-opacity-50 fs-18px me-2 my-n2"></iconify-icon>
                                    Настройки пользователя
                                </h4>
                                <p class="text-white text-opacity-50 small">Информация об аккаунте</p>
                                <div class="card">
                                    <div class="card-body d-flex align-items-center">
                                        <div class="flex-fill">
                                            <div class="text-white text-opacity-50">ID</div>
                                            <div class="text-white">#{{ $user['id'] }}</div>
                                        </div>
                                    </div>
                                    <div class="card-body d-flex align-items-center">
                                        <div class="flex-fill">
                                            <div class="text-white text-opacity-50">Логин</div>
                                            <div class="text-white">{{ $user['name'] }}</div>
                                        </div>
                                    </div>
                                    <div class="card-body d-flex align-items-center">
                                        <div class="flex-fill">
                                            <div class="text-white text-opacity-50">Дата создания</div>
                                            <div
                                                class="text-white">{{ \Carbon\Carbon::parse($user['created_at']) }}</div>
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
                                    Telegram
                                </h4>
                                <p class="text-white text-opacity-50 small">Настройки связи с Telegram ботом</p>
                                <form action="{{ route('settings.chat') }}" method="POST"
                                      class="card">
                                    @csrf
                                    <div class="card-body">
                                        <label for="chat_id">Chat ID</label>
                                        <div class="input-group">
                                            <input id="chat_id" name="chat_id" type="text"
                                                   class="form-control @error('chat_id') is-invalid @enderror"
                                                   value="{{ $telegram !== null ? $telegram['chat_id'] : '' }}">
                                            <x-input-error :messages="$errors->get('chat_id')" class="mt-2"/>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <label for="username">Username</label>
                                        <div class="input-group">
                                            <input id="username" name="username" type="text"
                                                   class="form-control @error('username') is-invalid @enderror"
                                                   value="{{ $telegram !== null ? $telegram['username'] : '' }}">
                                            <x-input-error :messages="$errors->get('username')" class="mt-2"/>
                                        </div>
                                    </div>
                                    <div class="card-body d-flex align-items-center">
                                        <div class="flex-fill">
                                            <div class="text-white text-opacity-50">Дата привязки</div>
                                            <div
                                                class="text-white">{{ $telegram !== null ? \Carbon\Carbon::parse($telegram['created_at']) : '' }}</div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-outline-theme">
                                        Сохранить
                                    </button>
                                </form>


                            </div>
                            <!-- END #notifications -->
                        </div>
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
