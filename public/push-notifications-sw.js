let url;

self.addEventListener('push', function (event) {
    if (!(self.Notification && self.Notification.permission === 'granted')) {
        return;
    }

    if (event.data) {
        const msg = event.data.json();
        url = msg.data.url;
        event.waitUntil(
            self.registration.showNotification(msg.title, {
                body: msg.body,
                icon: msg.icon,
                actions: msg.actions,
            }));
    }
});

self.addEventListener('notificationclick', function (event) {
    event.notification.close();

    if (event.action === 'view_survey') {
        event.waitUntil(
            clients.openWindow(url),
        );
    }
});
