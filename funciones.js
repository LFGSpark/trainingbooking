fetch('https://<base_url>/api/v2/<account_owner_name>/<app_link_name>/form/<form_link_name>', { method: 'POST', body: {} });
.then(response => response.json());
.then(data => console.log(data);