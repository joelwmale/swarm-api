export const formatApiErrors = (errorObject: any): Array<string> => {
  const errors: Array<string> = [];
  for (const key in errorObject) {
    const field: any = errorObject[key];
    switch (typeof field) {
      case 'string':
        errors.push(field);
        break;

      case 'object':
        for (const childKey in field) {
          const array: Array<string> = field[childKey];
          for (const index of array) {
            errors.push(index);
          }
        }
        break;
    }
  }
  return errors;
}
