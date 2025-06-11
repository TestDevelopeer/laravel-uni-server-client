<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Settings') }}
        </h2>
    </x-slot>

    <div class="container pt-5">
        <div class="row">
            <div class="bg-dark overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Ваши сервисы") }}
                </div>
            </div>
        </div>
        <div class="row">

            <table class="table">
                <thead class="table-light">
                <tr>
                    <th scope="col">Название</th>
                    <th scope="col">Статус</th>
                    <th scope="col">Дата изменения</th>
                    <th scope="col">Действие</th>
                </tr>
                </thead>
                <tbody class="table-dark">
                @forelse($settings as $setting)
                    <form action="{{route('settings.update', ['setting' => $setting->id])}}" method="post">
                        @csrf
                        @method('PATCH')
                        <tr>
                            <td class="align-middle">
                                {{$setting->type}}
                            </td>
                            <td class="align-middle">
                            <span @class([
                                'badge',
                                'text-bg-success' => $setting->status,
                                'text-bg-danger' => !$setting->status,
                            ])>
                                @if($setting->status)
                                    Вкл
                                @else
                                    Выкл
                                @endif
                            </span>
                            </td>
                            <td class="align-middle">{{$setting->updated_at}}</td>
                            <td class="align-middle">
                                <button type="submit"
                                        @class([
                                            'btn',
                                            'btn-outline-success' => !$setting->status,
                                            'btn-outline-danger' => $setting->status
                                        ])
                                        style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
                                    @if($setting->status)
                                        Выключить
                                    @else
                                        Включить
                                    @endif
                                </button>
                                <a href="https://t.me/AspUniServerBot?login={{ Auth::id() }}">https://t.me/AspUniServerBot?login={{ Auth::id() }}</a>
                            </td>
                        </tr>
                    </form>
                @empty
                    <tr>
                        <td>Не найдено сервисов</td>
                        <td></td>
                        <td></td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
