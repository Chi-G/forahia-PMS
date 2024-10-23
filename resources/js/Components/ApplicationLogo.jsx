export default function ApplicationLogo(props) {
  return (
      <img
          src="/logo.png"
          alt="App Logo"
          className="h-12 w-auto"
          {...props} // This allows passing additional props like className
      />
  );
}
