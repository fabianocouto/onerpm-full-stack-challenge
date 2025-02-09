export default function SpotifyEmbedPlayer({ spotify_track_id }) {
  return (
    <iframe
      style={{ borderRadius: "12px"}}
      src={`https://open.spotify.com/embed/track/${spotify_track_id}?utm_source=generator&theme=0`}
      width="100%"
      height="80"
      frameBorder="0"
      allowFullScreen=""
      allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"
      loading="lazy"
      scrolling="no"
    ></iframe>
  );
}