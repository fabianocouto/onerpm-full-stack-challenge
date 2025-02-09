import MediaThemeTailwindAudio from 'player.style/tailwind-audio/react';
import { Link } from '@inertiajs/react';

export default function TrackCard({ track }) {
  return (
    <div className="flex flex-row w-full">
      <div className="relative flex flex-col md:flex-row w-full my-6 bg-black shadow-sm border border-stone-800 rounded-lg">
        <div className="relative h-48 w-48 p-2.5 shrink-0 overflow-hidden">
          <img
            src={ track.album.cover_image_url }
            alt="card-image"
            className="h-full w-full rounded-md md:rounded-lg object-cover"
          />
        </div>
        <div className="px-6 py-2.5 w-full">
          <Link href={track.album.spotify_album_url} className="hover:underline text-md text-neutral-400">
            { track.album.title }
          </Link>
          <h4 className="mb-2 text-neutral-200 text-xl font-semibold">
            { track.title }
          </h4>
          <p className="text-sm text-neutral-400 mb-4">
            {'Artista: '}
            { track.artists.map((artist, index) => (
              <Link href={artist.spotify_artist_url} className="hover:underline" >
                { artist.name }
                { index !== track.artists.length - 1 && ', '}
              </Link>
            ))}
          </p>
          <MediaThemeTailwindAudio
            style={{ "--media-primary-color": "#bd0000", "--media-secondary-color": "#000000", "--media-accent-color": "#f50000", "width": "100%" }}
          >
            <audio
              slot="media"
              src="https://stream.mux.com/fXNzVtmtWuyz00xnSrJg4OJH6PyNo6D02UzmgeKGkP5YQ/low.mp4"
              playsInline
              crossOrigin="true"
            ></audio>
          </MediaThemeTailwindAudio>
        </div>
      </div>
    </div>
  );
}