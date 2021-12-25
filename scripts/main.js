function onSubmit (event) {
  event.preventDefault();

  event.submit().then(payload => console.log({ payload })).catch(err => console.error({ err }));
}