@props(['url'])
<tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block;">
            @if (trim($slot) === 'Laravel')
                <img src="https://scontent.fdvo2-1.fna.fbcdn.net/v/t39.30808-6/408474886_3141167066014160_1145958678918394964_n.jpg?_nc_cat=108&ccb=1-7&_nc_sid=3635dc&_nc_eui2=AeGv2al0RecYQdFmzvKOqiSsDoTAX3xXrOkOhMBffFes6SvlBW1lGDuLu2dfAb6KHcBdJBGqjSS5R4F6PDe9RxX3&_nc_ohc=voGh-DyLkRwAX9bK3go&_nc_ht=scontent.fdvo2-1.fna&oh=00_AfCZ2LdC8iZSheKFuZIoN2VDAvUFrNZvSqI0RzPN9kjGFg&oe=657A9A72"
                    class="logo" alt="Laravel Logo">
            @else
                {{ $slot }}
            @endif
        </a>
    </td>
</tr>
