<x-main>
    <div class="container">
        <div class="columns mt-6 mb-6">
            <div class="column">
                <h1 class="title is-2 has-text-white-bis">All the holodecks</h1>
            </div>
            <div class="column">
                <a href="{{ route('holodecks.create') }}" class="button is-primary is-pulled-right">
                    Add a holodeck
                </a>
            </div>
        </div>

        @foreach($holodecks as $holodeck)
            <article class="media">
                <div class="media-content">
                    <div class="content">
                        <p>
                            <strong style="color: white">{{ $holodeck->id }}: </strong>
                            <a href="{{ route('holodecks.show', $holodeck) }}">
                              <strong>{{ $holodeck->type }}</strong>
                            </a>
                            <a href="{{ route('holodecks.edit', $holodeck) }}" class="button is-primary">
                                Edit
                            </a>
                            <br>
                            <small>Serial_no: {{ $holodeck->serial_no }}</small>
                            <br>
                            <small>sw_Version: {{ $holodeck->sw_version }}</small>
                        </p>
                    </div>
                </div>
            </article>
        @endforeach
    </div>
    <div style="visibility: hidden">Starfleet</div>
</x-main>
