/*
 * "$Id: config.h.in 408 2010-09-19 05:26:46Z mike $"
 *
 * Configuration file for Mini-XML, a small XML-like file parsing library.
 *
 * Copyright 2003-2010 by Michael R Sweet.
 *
 * These coded instructions, statements, and computer programs are the
 * property of Michael R Sweet and are protected by Federal copyright
 * law.  Distribution and use rights are outlined in the file "COPYING"
 * which should have been included with this file.  If this file is
 * missing or damaged, see the license at:
 *
 *     http://www.minixml.org/
 */

/*
 * Include necessary headers...
 */

#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <stdarg.h>
#include <ctype.h>


/*
 * Version number...
 */

#define MXML_VERSION    ""


/*
 * Inline function support...
 */

#define inline


/*
 * Long long support...
 */

#undef HAVE_LONG_LONG


/*
 * Do we have the snprintf() and vsnprintf() functions?
 */

#undef HAVE_SNPRINTF
#undef HAVE_VSNPRINTF


/*
 * Do we have the strXXX() functions?
 */

#undef HAVE_STRDUP


/*
 * Do we have threading support?
 */

#undef HAVE_PTHREAD_H


/*
 * Define prototypes for string functions as needed...
 */

#  ifndef HAVE_STRDUP
extern char* _mxml_strdup(const char*);
#    define strdup _mxml_strdup
#  endif /* !HAVE_STRDUP */

extern char* _mxml_strdupf(const char*, ...);
extern char* _mxml_vstrdupf(const char*, va_list);

#  ifndef HAVE_SNPRINTF
extern int  _mxml_snprintf(char*, size_t, const char*, ...);
#    define snprintf _mxml_snprintf
#  endif /* !HAVE_SNPRINTF */

#  ifndef HAVE_VSNPRINTF
extern int  _mxml_vsnprintf(char*, size_t, const char*, va_list);
#    define vsnprintf _mxml_vsnprintf
#  endif /* !HAVE_VSNPRINTF */

/*
 * End of "$Id: config.h.in 408 2010-09-19 05:26:46Z mike $".
 */
