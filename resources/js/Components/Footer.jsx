import { Link } from "@inertiajs/react";

export default function Footer() {
  return (
    <footer
      className="bg-gray-100 dark:bg-gray-400 text-gray-900 dark:text-gray-400 mt-4"
      style={{ paddingTop: "0.5rem", paddingBottom: "1.5rem" }}
    >
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {/* Copyright */}
        <div className="text-center text-xs text-gray-500 dark:text-gray-600">
          &copy; {new Date().getFullYear()} Forahia Project Management. All rights reserved.
        </div>
      </div>
    </footer>
  );
}
