export const asset = (path) => {
  return `${import.meta.env.VITE_LARAVEL_URL}/${path}`
}