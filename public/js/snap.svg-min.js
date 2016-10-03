// Snap.svg 0.3.0
// 
// Copyright (c) 2013 Adobe Systems Incorporated. All rights reserved.
// 
// Licensed under the Apache License, Version 2.0 (the "License");
// you may not use this file except in compliance with the License.
// You may obtain a copy of the License at
// 
// http://www.apache.org/licenses/LICENSE-2.0
// 
// Unless required by applicable law or agreed to in writing, software
// distributed under the License is distributed on an "AS IS" BASIS,
// WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
// See the License for the specific language governing permissions and
// limitations under the License.
// 
// build: 2014-06-03
!function (a) {
    var b, c, d = "0.4.2", e = "hasOwnProperty", f = /[\.\/]/, g = /\s*,\s*/, h = "*", i = function (a, b) {
        return a - b
    }, j = {n: {}}, k = function () {
        for (var a = 0, b = this.length; b > a; a++)if ("undefined" != typeof this[a])return this[a]
    }, l = function () {
        for (var a = this.length; --a;)if ("undefined" != typeof this[a])return this[a]
    }, m = function (a, d) {
        a = String(a);
        var e, f = c, g = Array.prototype.slice.call(arguments, 2), h = m.listeners(a), j = 0, n = [], o = {}, p = [], q = b;
        p.firstDefined = k, p.lastDefined = l, b = a, c = 0;
        for (var r = 0, s = h.length; s > r; r++)"zIndex" in h[r] && (n.push(h[r].zIndex), h[r].zIndex < 0 && (o[h[r].zIndex] = h[r]));
        for (n.sort(i); n[j] < 0;)if (e = o[n[j++]], p.push(e.apply(d, g)), c)return c = f, p;
        for (r = 0; s > r; r++)if (e = h[r], "zIndex" in e)if (e.zIndex == n[j]) {
            if (p.push(e.apply(d, g)), c)break;
            do if (j++, e = o[n[j]], e && p.push(e.apply(d, g)), c)break; while (e)
        } else o[e.zIndex] = e; else if (p.push(e.apply(d, g)), c)break;
        return c = f, b = q, p
    };
    m._events = j, m.listeners = function (a) {
        var b, c, d, e, g, i, k, l, m = a.split(f), n = j, o = [n], p = [];
        for (e = 0, g = m.length; g > e; e++) {
            for (l = [], i = 0, k = o.length; k > i; i++)for (n = o[i].n, c = [n[m[e]], n[h]], d = 2; d--;)b = c[d], b && (l.push(b), p = p.concat(b.f || []));
            o = l
        }
        return p
    }, m.on = function (a, b) {
        if (a = String(a), "function" != typeof b)return function () {
        };
        for (var c = a.split(g), d = 0, e = c.length; e > d; d++)!function (a) {
            for (var c, d = a.split(f), e = j, g = 0, h = d.length; h > g; g++)e = e.n, e = e.hasOwnProperty(d[g]) && e[d[g]] || (e[d[g]] = {n: {}});
            for (e.f = e.f || [], g = 0, h = e.f.length; h > g; g++)if (e.f[g] == b) {
                c = !0;
                break
            }
            !c && e.f.push(b)
        }(c[d]);
        return function (a) {
            +a == +a && (b.zIndex = +a)
        }
    }, m.f = function (a) {
        var b = [].slice.call(arguments, 1);
        return function () {
            m.apply(null, [a, null].concat(b).concat([].slice.call(arguments, 0)))
        }
    }, m.stop = function () {
        c = 1
    }, m.nt = function (a) {
        return a ? new RegExp("(?:\\.|\\/|^)" + a + "(?:\\.|\\/|$)").test(b) : b
    }, m.nts = function () {
        return b.split(f)
    }, m.off = m.unbind = function (a, b) {
        if (!a)return void(m._events = j = {n: {}});
        var c = a.split(g);
        if (c.length > 1)for (var d = 0, i = c.length; i > d; d++)m.off(c[d], b); else {
            c = a.split(f);
            var k, l, n, d, i, o, p, q = [j];
            for (d = 0, i = c.length; i > d; d++)for (o = 0; o < q.length; o += n.length - 2) {
                if (n = [o, 1], k = q[o].n, c[d] != h)k[c[d]] && n.push(k[c[d]]); else for (l in k)k[e](l) && n.push(k[l]);
                q.splice.apply(q, n)
            }
            for (d = 0, i = q.length; i > d; d++)for (k = q[d]; k.n;) {
                if (b) {
                    if (k.f) {
                        for (o = 0, p = k.f.length; p > o; o++)if (k.f[o] == b) {
                            k.f.splice(o, 1);
                            break
                        }
                        !k.f.length && delete k.f
                    }
                    for (l in k.n)if (k.n[e](l) && k.n[l].f) {
                        var r = k.n[l].f;
                        for (o = 0, p = r.length; p > o; o++)if (r[o] == b) {
                            r.splice(o, 1);
                            break
                        }
                        !r.length && delete k.n[l].f
                    }
                } else {
                    delete k.f;
                    for (l in k.n)k.n[e](l) && k.n[l].f && delete k.n[l].f
                }
                k = k.n
            }
        }
    }, m.once = function (a, b) {
        var c = function () {
            return m.unbind(a, c), b.apply(this, arguments)
        };
        return m.on(a, c)
    }, m.version = d, m.toString = function () {
        return "You are running Eve " + d
    }, "undefined" != typeof module && module.exports ? module.exports = m : "function" == typeof define && define.amd ? define("eve", [], function () {
        return m
    }) : a.eve = m
}(this), function (a, b) {
    "function" == typeof define && define.amd ? define(["eve"], function (c) {
        return b(a, c)
    }) : b(a, a.eve)
}(this, function (a, b) {
    var c = function (b) {
        var c = {}, d = a.requestAnimationFrame || a.webkitRequestAnimationFrame || a.mozRequestAnimationFrame || a.oRequestAnimationFrame || a.msRequestAnimationFrame || function (a) {
                setTimeout(a, 16)
            }, e = Array.isArray || function (a) {
                return a instanceof Array || "[object Array]" == Object.prototype.toString.call(a)
            }, f = 0, g = "M" + (+new Date).toString(36), h = function () {
            return g + (f++).toString(36)
        }, i = Date.now || function () {
                return +new Date
            }, j = function (a) {
            var b = this;
            if (null == a)return b.s;
            var c = b.s - a;
            b.b += b.dur * c, b.B += b.dur * c, b.s = a
        }, k = function (a) {
            var b = this;
            return null == a ? b.spd : void(b.spd = a)
        }, l = function (a) {
            var b = this;
            return null == a ? b.dur : (b.s = b.s * a / b.dur, void(b.dur = a))
        }, m = function () {
            var a = this;
            delete c[a.id], a.update(), b("mina.stop." + a.id, a)
        }, n = function () {
            var a = this;
            a.pdif || (delete c[a.id], a.update(), a.pdif = a.get() - a.b)
        }, o = function () {
            var a = this;
            a.pdif && (a.b = a.get() - a.pdif, delete a.pdif, c[a.id] = a)
        }, p = function () {
            var a, b = this;
            if (e(b.start)) {
                a = [];
                for (var c = 0, d = b.start.length; d > c; c++)a[c] = +b.start[c] + (b.end[c] - b.start[c]) * b.easing(b.s)
            } else a = +b.start + (b.end - b.start) * b.easing(b.s);
            b.set(a)
        }, q = function () {
            var a = 0;
            for (var e in c)if (c.hasOwnProperty(e)) {
                var f = c[e], g = f.get();
                a++, f.s = (g - f.b) / (f.dur / f.spd), f.s >= 1 && (delete c[e], f.s = 1, a--, function (a) {
                    setTimeout(function () {
                        b("mina.finish." + a.id, a)
                    })
                }(f)), f.update()
            }
            a && d(q)
        }, r = function (a, b, e, f, g, i, s) {
            var t = {
                id: h(),
                start: a,
                end: b,
                b: e,
                s: 0,
                dur: f - e,
                spd: 1,
                get: g,
                set: i,
                easing: s || r.linear,
                status: j,
                speed: k,
                duration: l,
                stop: m,
                pause: n,
                resume: o,
                update: p
            };
            c[t.id] = t;
            var u, v = 0;
            for (u in c)if (c.hasOwnProperty(u) && (v++, 2 == v))break;
            return 1 == v && d(q), t
        };
        return r.time = i, r.getById = function (a) {
            return c[a] || null
        }, r.linear = function (a) {
            return a
        }, r.easeout = function (a) {
            return Math.pow(a, 1.7)
        }, r.easein = function (a) {
            return Math.pow(a, .48)
        }, r.easeinout = function (a) {
            if (1 == a)return 1;
            if (0 == a)return 0;
            var b = .48 - a / 1.04, c = Math.sqrt(.1734 + b * b), d = c - b, e = Math.pow(Math.abs(d), 1 / 3) * (0 > d ? -1 : 1), f = -c - b, g = Math.pow(Math.abs(f), 1 / 3) * (0 > f ? -1 : 1), h = e + g + .5;
            return 3 * (1 - h) * h * h + h * h * h
        }, r.backin = function (a) {
            if (1 == a)return 1;
            var b = 1.70158;
            return a * a * ((b + 1) * a - b)
        }, r.backout = function (a) {
            if (0 == a)return 0;
            a -= 1;
            var b = 1.70158;
            return a * a * ((b + 1) * a + b) + 1
        }, r.elastic = function (a) {
            return a == !!a ? a : Math.pow(2, -10 * a) * Math.sin(2 * (a - .075) * Math.PI / .3) + 1
        }, r.bounce = function (a) {
            var b, c = 7.5625, d = 2.75;
            return 1 / d > a ? b = c * a * a : 2 / d > a ? (a -= 1.5 / d, b = c * a * a + .75) : 2.5 / d > a ? (a -= 2.25 / d, b = c * a * a + .9375) : (a -= 2.625 / d, b = c * a * a + .984375), b
        }, a.mina = r, r
    }("undefined" == typeof b ? function () {
    } : b), d = function () {
        function d(a, b) {
            if (a) {
                if (a.tagName)return y(a);
                if (f(a, "array") && d.set)return d.set.apply(d, a);
                if (a instanceof u)return a;
                if (null == b)return a = z.doc.querySelector(a), y(a)
            }
            return a = null == a ? "100%" : a, b = null == b ? "100%" : b, new x(a, b)
        }

        function e(a, b) {
            if (b) {
                if ("#text" == a && (a = z.doc.createTextNode(b.text || "")), "string" == typeof a && (a = e(a)), "string" == typeof b)return "xlink:" == b.substring(0, 6) ? a.getAttributeNS(W, b.substring(6)) : "xml:" == b.substring(0, 4) ? a.getAttributeNS(X, b.substring(4)) : a.getAttribute(b);
                for (var c in b)if (b[A](c)) {
                    var d = B(b[c]);
                    d ? "xlink:" == c.substring(0, 6) ? a.setAttributeNS(W, c.substring(6), d) : "xml:" == c.substring(0, 4) ? a.setAttributeNS(X, c.substring(4), d) : a.setAttribute(c, d) : a.removeAttribute(c)
                }
            } else a = z.doc.createElementNS(X, a);
            return a
        }

        function f(a, b) {
            return b = B.prototype.toLowerCase.call(b), "finite" == b ? isFinite(a) : "array" == b && (a instanceof Array || Array.isArray && Array.isArray(a)) ? !0 : "null" == b && null === a || b == typeof a && null !== a || "object" == b && a === Object(a) || L.call(a).slice(8, -1).toLowerCase() == b
        }

        function h(a) {
            if ("function" == typeof a || Object(a) !== a)return a;
            var b = new a.constructor;
            for (var c in a)a[A](c) && (b[c] = h(a[c]));
            return b
        }

        function i(a, b) {
            for (var c = 0, d = a.length; d > c; c++)if (a[c] === b)return a.push(a.splice(c, 1)[0])
        }

        function j(a, b, c) {
            function d() {
                var e = Array.prototype.slice.call(arguments, 0), f = e.join("␀"), g = d.cache = d.cache || {}, h = d.count = d.count || [];
                return g[A](f) ? (i(h, f), c ? c(g[f]) : g[f]) : (h.length >= 1e3 && delete g[h.shift()], h.push(f), g[f] = a.apply(b, e), c ? c(g[f]) : g[f])
            }

            return d
        }

        function k(a, b, c, d, e, f) {
            if (null == e) {
                var g = a - c, h = b - d;
                return g || h ? (180 + 180 * E.atan2(-h, -g) / I + 360) % 360 : 0
            }
            return k(a, b, e, f) - k(c, d, e, f)
        }

        function l(a) {
            return a % 360 * I / 180
        }

        function m(a) {
            return 180 * a / I % 360
        }

        function n(a) {
            var b = [];
            return a = a.replace(/(?:^|\s)(\w+)\(([^)]+)\)/g, function (a, c, d) {
                return d = d.split(/\s*,\s*|\s+/), "rotate" == c && 1 == d.length && d.push(0, 0), "scale" == c && (d.length > 2 ? d = d.slice(0, 2) : 2 == d.length && d.push(0, 0), 1 == d.length && d.push(d[0], 0, 0)), b.push("skewX" == c ? ["m", 1, 0, E.tan(l(d[0])), 1, 0, 0] : "skewY" == c ? ["m", 1, E.tan(l(d[0])), 0, 1, 0, 0] : [c.charAt(0)].concat(d)), a
            }), b
        }

        function o(a, b) {
            var c = eb(a), e = new d.Matrix;
            if (c)for (var f = 0, g = c.length; g > f; f++) {
                var h, i, j, k, l, m = c[f], n = m.length, o = B(m[0]).toLowerCase(), p = m[0] != o, q = p ? e.invert() : 0;
                "t" == o && 2 == n ? e.translate(m[1], 0) : "t" == o && 3 == n ? p ? (h = q.x(0, 0), i = q.y(0, 0), j = q.x(m[1], m[2]), k = q.y(m[1], m[2]), e.translate(j - h, k - i)) : e.translate(m[1], m[2]) : "r" == o ? 2 == n ? (l = l || b, e.rotate(m[1], l.x + l.width / 2, l.y + l.height / 2)) : 4 == n && (p ? (j = q.x(m[2], m[3]), k = q.y(m[2], m[3]), e.rotate(m[1], j, k)) : e.rotate(m[1], m[2], m[3])) : "s" == o ? 2 == n || 3 == n ? (l = l || b, e.scale(m[1], m[n - 1], l.x + l.width / 2, l.y + l.height / 2)) : 4 == n ? p ? (j = q.x(m[2], m[3]), k = q.y(m[2], m[3]), e.scale(m[1], m[1], j, k)) : e.scale(m[1], m[1], m[2], m[3]) : 5 == n && (p ? (j = q.x(m[3], m[4]), k = q.y(m[3], m[4]), e.scale(m[1], m[2], j, k)) : e.scale(m[1], m[2], m[3], m[4])) : "m" == o && 7 == n && e.add(m[1], m[2], m[3], m[4], m[5], m[6])
            }
            return e
        }

        function p(a, b) {
            if (null == b) {
                var c = !0;
                if (b = a.node.getAttribute("linearGradient" == a.type || "radialGradient" == a.type ? "gradientTransform" : "pattern" == a.type ? "patternTransform" : "transform"), !b)return new d.Matrix;
                b = n(b)
            } else b = d._.rgTransform.test(b) ? B(b).replace(/\.{3}|\u2026/g, a._.transform || J) : n(b), f(b, "array") && (b = d.path ? d.path.toString.call(b) : B(b)), a._.transform = b;
            var e = o(b, a.getBBox(1));
            return c ? e : void(a.matrix = e)
        }

        function q(a) {
            var b = a.node.ownerSVGElement && y(a.node.ownerSVGElement) || a.node.parentNode && y(a.node.parentNode) || d.select("svg") || d(0, 0), c = b.select("defs"), e = null == c ? !1 : c.node;
            return e || (e = w("defs", b.node).node), e
        }

        function r(a) {
            return a.node.ownerSVGElement && y(a.node.ownerSVGElement) || d.select("svg")
        }

        function s(a, b, c) {
            function d(a) {
                if (null == a)return J;
                if (a == +a)return a;
                e(j, {width: a});
                try {
                    return j.getBBox().width
                } catch (b) {
                    return 0
                }
            }

            function f(a) {
                if (null == a)return J;
                if (a == +a)return a;
                e(j, {height: a});
                try {
                    return j.getBBox().height
                } catch (b) {
                    return 0
                }
            }

            function g(d, e) {
                null == b ? i[d] = e(a.attr(d) || 0) : d == b && (i = e(null == c ? a.attr(d) || 0 : c))
            }

            var h = r(a).node, i = {}, j = h.querySelector(".svg---mgr");
            switch (j || (j = e("rect"), e(j, {
                x: -9e9,
                y: -9e9,
                width: 10,
                height: 10,
                "class": "svg---mgr",
                fill: "none"
            }), h.appendChild(j)), a.type) {
                case"rect":
                    g("rx", d), g("ry", f);
                case"image":
                    g("width", d), g("height", f);
                case"text":
                    g("x", d), g("y", f);
                    break;
                case"circle":
                    g("cx", d), g("cy", f), g("r", d);
                    break;
                case"ellipse":
                    g("cx", d), g("cy", f), g("rx", d), g("ry", f);
                    break;
                case"line":
                    g("x1", d), g("x2", d), g("y1", f), g("y2", f);
                    break;
                case"marker":
                    g("refX", d), g("markerWidth", d), g("refY", f), g("markerHeight", f);
                    break;
                case"radialGradient":
                    g("fx", d), g("fy", f);
                    break;
                case"tspan":
                    g("dx", d), g("dy", f);
                    break;
                default:
                    g(b, d)
            }
            return h.removeChild(j), i
        }

        function t(a) {
            f(a, "array") || (a = Array.prototype.slice.call(arguments, 0));
            for (var b = 0, c = 0, d = this.node; this[b];)delete this[b++];
            for (b = 0; b < a.length; b++)"set" == a[b].type ? a[b].forEach(function (a) {
                d.appendChild(a.node)
            }) : d.appendChild(a[b].node);
            var e = d.childNodes;
            for (b = 0; b < e.length; b++)this[c++] = y(e[b]);
            return this
        }

        function u(a) {
            if (a.snap in Y)return Y[a.snap];
            var b, c = this.id = V();
            try {
                b = a.ownerSVGElement
            } catch (d) {
            }
            if (this.node = a, b && (this.paper = new x(b)), this.type = a.tagName, this.anims = {}, this._ = {transform: []}, a.snap = c, Y[c] = this, "g" == this.type && (this.add = t), this.type in {
                    g: 1,
                    mask: 1,
                    pattern: 1
                })for (var e in x.prototype)x.prototype[A](e) && (this[e] = x.prototype[e])
        }

        function v(a) {
            this.node = a
        }

        function w(a, b) {
            var c = e(a);
            b.appendChild(c);
            var d = y(c);
            return d
        }

        function x(a, b) {
            var c, d, f, g = x.prototype;
            if (a && "svg" == a.tagName) {
                if (a.snap in Y)return Y[a.snap];
                var h = a.ownerDocument;
                c = new u(a), d = a.getElementsByTagName("desc")[0], f = a.getElementsByTagName("defs")[0], d || (d = e("desc"), d.appendChild(h.createTextNode("Created with Snap")), c.node.appendChild(d)), f || (f = e("defs"), c.node.appendChild(f)), c.defs = f;
                for (var i in g)g[A](i) && (c[i] = g[i]);
                c.paper = c.root = c
            } else c = w("svg", z.doc.body), e(c.node, {height: b, version: 1.1, width: a, xmlns: X});
            return c
        }

        function y(a) {
            return a ? a instanceof u || a instanceof v ? a : a.tagName && "svg" == a.tagName.toLowerCase() ? new x(a) : a.tagName && "object" == a.tagName.toLowerCase() && "image/svg+xml" == a.type ? new x(a.contentDocument.getElementsByTagName("svg")[0]) : new u(a) : a
        }

        d.version = "0.3.0", d.toString = function () {
            return "Snap v" + this.version
        }, d._ = {};
        var z = {win: a, doc: a.document};
        d._.glob = z;
        var A = "hasOwnProperty", B = String, C = parseFloat, D = parseInt, E = Math, F = E.max, G = E.min, H = E.abs, I = (E.pow, E.PI), J = (E.round, ""), K = " ", L = Object.prototype.toString, M = /^\s*((#[a-f\d]{6})|(#[a-f\d]{3})|rgba?\(\s*([\d\.]+%?\s*,\s*[\d\.]+%?\s*,\s*[\d\.]+%?(?:\s*,\s*[\d\.]+%?)?)\s*\)|hsba?\(\s*([\d\.]+(?:deg|\xb0|%)?\s*,\s*[\d\.]+%?\s*,\s*[\d\.]+(?:%?\s*,\s*[\d\.]+)?%?)\s*\)|hsla?\(\s*([\d\.]+(?:deg|\xb0|%)?\s*,\s*[\d\.]+%?\s*,\s*[\d\.]+(?:%?\s*,\s*[\d\.]+)?%?)\s*\))\s*$/i, N = "	\n\f\r   ᠎             　\u2028\u2029", O = (d._.separator = new RegExp("[," + N + "]+"), new RegExp("[" + N + "]", "g"), new RegExp("[" + N + "]*,[" + N + "]*")), P = {
            hs: 1,
            rg: 1
        }, Q = new RegExp("([a-z])[" + N + ",]*((-?\\d*\\.?\\d*(?:e[\\-+]?\\d+)?[" + N + "]*,?[" + N + "]*)+)", "ig"), R = new RegExp("([rstm])[" + N + ",]*((-?\\d*\\.?\\d*(?:e[\\-+]?\\d+)?[" + N + "]*,?[" + N + "]*)+)", "ig"), S = new RegExp("(-?\\d*\\.?\\d*(?:e[\\-+]?\\d+)?)[" + N + "]*,?[" + N + "]*", "ig"), T = 0, U = "S" + (+new Date).toString(36), V = function () {
            return U + (T++).toString(36)
        }, W = "http://www.w3.org/1999/xlink", X = "http://www.w3.org/2000/svg", Y = {}, Z = d.url = function (a) {
            return "url('#" + a + "')"
        };
        d._.$ = e, d._.id = V, d.format = function () {
            var a = /\{([^\}]+)\}/g, b = /(?:(?:^|\.)(.+?)(?=\[|\.|$|\()|\[('|")(.+?)\2\])(\(\))?/g, c = function (a, c, d) {
                var e = d;
                return c.replace(b, function (a, b, c, d, f) {
                    b = b || d, e && (b in e && (e = e[b]), "function" == typeof e && f && (e = e()))
                }), e = (null == e || e == d ? a : e) + ""
            };
            return function (b, d) {
                return B(b).replace(a, function (a, b) {
                    return c(a, b, d)
                })
            }
        }(), d._.clone = h, d._.cacher = j, d.rad = l, d.deg = m, d.angle = k, d.is = f, d.snapTo = function (a, b, c) {
            if (c = f(c, "finite") ? c : 10, f(a, "array")) {
                for (var d = a.length; d--;)if (H(a[d] - b) <= c)return a[d]
            } else {
                a = +a;
                var e = b % a;
                if (c > e)return b - e;
                if (e > a - c)return b - e + a
            }
            return b
        }, d.getRGB = j(function (a) {
            if (!a || (a = B(a)).indexOf("-") + 1)return {r: -1, g: -1, b: -1, hex: "none", error: 1, toString: bb};
            if ("none" == a)return {r: -1, g: -1, b: -1, hex: "none", toString: bb};
            if (!(P[A](a.toLowerCase().substring(0, 2)) || "#" == a.charAt()) && (a = $(a)), !a)return {
                r: -1,
                g: -1,
                b: -1,
                hex: "none",
                error: 1,
                toString: bb
            };
            var b, c, e, g, h, i, j = a.match(M);
            return j ? (j[2] && (e = D(j[2].substring(5), 16), c = D(j[2].substring(3, 5), 16), b = D(j[2].substring(1, 3), 16)), j[3] && (e = D((h = j[3].charAt(3)) + h, 16), c = D((h = j[3].charAt(2)) + h, 16), b = D((h = j[3].charAt(1)) + h, 16)), j[4] && (i = j[4].split(O), b = C(i[0]), "%" == i[0].slice(-1) && (b *= 2.55), c = C(i[1]), "%" == i[1].slice(-1) && (c *= 2.55), e = C(i[2]), "%" == i[2].slice(-1) && (e *= 2.55), "rgba" == j[1].toLowerCase().slice(0, 4) && (g = C(i[3])), i[3] && "%" == i[3].slice(-1) && (g /= 100)), j[5] ? (i = j[5].split(O), b = C(i[0]), "%" == i[0].slice(-1) && (b /= 100), c = C(i[1]), "%" == i[1].slice(-1) && (c /= 100), e = C(i[2]), "%" == i[2].slice(-1) && (e /= 100), ("deg" == i[0].slice(-3) || "°" == i[0].slice(-1)) && (b /= 360), "hsba" == j[1].toLowerCase().slice(0, 4) && (g = C(i[3])), i[3] && "%" == i[3].slice(-1) && (g /= 100), d.hsb2rgb(b, c, e, g)) : j[6] ? (i = j[6].split(O), b = C(i[0]), "%" == i[0].slice(-1) && (b /= 100), c = C(i[1]), "%" == i[1].slice(-1) && (c /= 100), e = C(i[2]), "%" == i[2].slice(-1) && (e /= 100), ("deg" == i[0].slice(-3) || "°" == i[0].slice(-1)) && (b /= 360), "hsla" == j[1].toLowerCase().slice(0, 4) && (g = C(i[3])), i[3] && "%" == i[3].slice(-1) && (g /= 100), d.hsl2rgb(b, c, e, g)) : (b = G(E.round(b), 255), c = G(E.round(c), 255), e = G(E.round(e), 255), g = G(F(g, 0), 1), j = {
                r: b,
                g: c,
                b: e,
                toString: bb
            }, j.hex = "#" + (16777216 | e | c << 8 | b << 16).toString(16).slice(1), j.opacity = f(g, "finite") ? g : 1, j)) : {
                r: -1,
                g: -1,
                b: -1,
                hex: "none",
                error: 1,
                toString: bb
            }
        }, d), d.hsb = j(function (a, b, c) {
            return d.hsb2rgb(a, b, c).hex
        }), d.hsl = j(function (a, b, c) {
            return d.hsl2rgb(a, b, c).hex
        }), d.rgb = j(function (a, b, c, d) {
            if (f(d, "finite")) {
                var e = E.round;
                return "rgba(" + [e(a), e(b), e(c), +d.toFixed(2)] + ")"
            }
            return "#" + (16777216 | c | b << 8 | a << 16).toString(16).slice(1)
        });
        var $ = function (a) {
            var b = z.doc.getElementsByTagName("head")[0] || z.doc.getElementsByTagName("svg")[0], c = "rgb(255, 0, 0)";
            return ($ = j(function (a) {
                if ("red" == a.toLowerCase())return c;
                b.style.color = c, b.style.color = a;
                var d = z.doc.defaultView.getComputedStyle(b, J).getPropertyValue("color");
                return d == c ? null : d
            }))(a)
        }, _ = function () {
            return "hsb(" + [this.h, this.s, this.b] + ")"
        }, ab = function () {
            return "hsl(" + [this.h, this.s, this.l] + ")"
        }, bb = function () {
            return 1 == this.opacity || null == this.opacity ? this.hex : "rgba(" + [this.r, this.g, this.b, this.opacity] + ")"
        }, cb = function (a, b, c) {
            if (null == b && f(a, "object") && "r" in a && "g" in a && "b" in a && (c = a.b, b = a.g, a = a.r), null == b && f(a, string)) {
                var e = d.getRGB(a);
                a = e.r, b = e.g, c = e.b
            }
            return (a > 1 || b > 1 || c > 1) && (a /= 255, b /= 255, c /= 255), [a, b, c]
        }, db = function (a, b, c, e) {
            a = E.round(255 * a), b = E.round(255 * b), c = E.round(255 * c);
            var g = {r: a, g: b, b: c, opacity: f(e, "finite") ? e : 1, hex: d.rgb(a, b, c), toString: bb};
            return f(e, "finite") && (g.opacity = e), g
        };
        d.color = function (a) {
            var b;
            return f(a, "object") && "h" in a && "s" in a && "b" in a ? (b = d.hsb2rgb(a), a.r = b.r, a.g = b.g, a.b = b.b, a.opacity = 1, a.hex = b.hex) : f(a, "object") && "h" in a && "s" in a && "l" in a ? (b = d.hsl2rgb(a), a.r = b.r, a.g = b.g, a.b = b.b, a.opacity = 1, a.hex = b.hex) : (f(a, "string") && (a = d.getRGB(a)), f(a, "object") && "r" in a && "g" in a && "b" in a && !("error" in a) ? (b = d.rgb2hsl(a), a.h = b.h, a.s = b.s, a.l = b.l, b = d.rgb2hsb(a), a.v = b.b) : (a = {hex: "none"}, a.r = a.g = a.b = a.h = a.s = a.v = a.l = -1, a.error = 1)), a.toString = bb, a
        }, d.hsb2rgb = function (a, b, c, d) {
            f(a, "object") && "h" in a && "s" in a && "b" in a && (c = a.b, b = a.s, a = a.h, d = a.o), a *= 360;
            var e, g, h, i, j;
            return a = a % 360 / 60, j = c * b, i = j * (1 - H(a % 2 - 1)), e = g = h = c - j, a = ~~a, e += [j, i, 0, 0, i, j][a], g += [i, j, j, i, 0, 0][a], h += [0, 0, i, j, j, i][a], db(e, g, h, d)
        }, d.hsl2rgb = function (a, b, c, d) {
            f(a, "object") && "h" in a && "s" in a && "l" in a && (c = a.l, b = a.s, a = a.h), (a > 1 || b > 1 || c > 1) && (a /= 360, b /= 100, c /= 100), a *= 360;
            var e, g, h, i, j;
            return a = a % 360 / 60, j = 2 * b * (.5 > c ? c : 1 - c), i = j * (1 - H(a % 2 - 1)), e = g = h = c - j / 2, a = ~~a, e += [j, i, 0, 0, i, j][a], g += [i, j, j, i, 0, 0][a], h += [0, 0, i, j, j, i][a], db(e, g, h, d)
        }, d.rgb2hsb = function (a, b, c) {
            c = cb(a, b, c), a = c[0], b = c[1], c = c[2];
            var d, e, f, g;
            return f = F(a, b, c), g = f - G(a, b, c), d = 0 == g ? null : f == a ? (b - c) / g : f == b ? (c - a) / g + 2 : (a - b) / g + 4, d = (d + 360) % 6 * 60 / 360, e = 0 == g ? 0 : g / f, {
                h: d,
                s: e,
                b: f,
                toString: _
            }
        }, d.rgb2hsl = function (a, b, c) {
            c = cb(a, b, c), a = c[0], b = c[1], c = c[2];
            var d, e, f, g, h, i;
            return g = F(a, b, c), h = G(a, b, c), i = g - h, d = 0 == i ? null : g == a ? (b - c) / i : g == b ? (c - a) / i + 2 : (a - b) / i + 4, d = (d + 360) % 6 * 60 / 360, f = (g + h) / 2, e = 0 == i ? 0 : .5 > f ? i / (2 * f) : i / (2 - 2 * f), {
                h: d,
                s: e,
                l: f,
                toString: ab
            }
        }, d.parsePathString = function (a) {
            if (!a)return null;
            var b = d.path(a);
            if (b.arr)return d.path.clone(b.arr);
            var c = {a: 7, c: 6, o: 2, h: 1, l: 2, m: 2, r: 4, q: 4, s: 4, t: 2, v: 1, u: 3, z: 0}, e = [];
            return f(a, "array") && f(a[0], "array") && (e = d.path.clone(a)), e.length || B(a).replace(Q, function (a, b, d) {
                var f = [], g = b.toLowerCase();
                if (d.replace(S, function (a, b) {
                        b && f.push(+b)
                    }), "m" == g && f.length > 2 && (e.push([b].concat(f.splice(0, 2))), g = "l", b = "m" == b ? "l" : "L"), "o" == g && 1 == f.length && e.push([b, f[0]]), "r" == g)e.push([b].concat(f)); else for (; f.length >= c[g] && (e.push([b].concat(f.splice(0, c[g]))), c[g]););
            }), e.toString = d.path.toString, b.arr = d.path.clone(e), e
        };
        var eb = d.parseTransformString = function (a) {
            if (!a)return null;
            var b = [];
            return f(a, "array") && f(a[0], "array") && (b = d.path.clone(a)), b.length || B(a).replace(R, function (a, c, d) {
                {
                    var e = [];
                    c.toLowerCase()
                }
                d.replace(S, function (a, b) {
                    b && e.push(+b)
                }), b.push([c].concat(e))
            }), b.toString = d.path.toString, b
        };
        d._.svgTransform2string = n, d._.rgTransform = new RegExp("^[a-z][" + N + "]*-?\\.?\\d", "i"), d._.transform2matrix = o, d._unit2px = s;
        z.doc.contains || z.doc.compareDocumentPosition ? function (a, b) {
            var c = 9 == a.nodeType ? a.documentElement : a, d = b && b.parentNode;
            return a == d || !(!d || 1 != d.nodeType || !(c.contains ? c.contains(d) : a.compareDocumentPosition && 16 & a.compareDocumentPosition(d)))
        } : function (a, b) {
            if (b)for (; b;)if (b = b.parentNode, b == a)return !0;
            return !1
        };
        d._.getSomeDefs = q, d._.getSomeSVG = r, d.select = function (a) {
            return y(z.doc.querySelector(a))
        }, d.selectAll = function (a) {
            for (var b = z.doc.querySelectorAll(a), c = (d.set || Array)(), e = 0; e < b.length; e++)c.push(y(b[e]));
            return c
        }, setInterval(function () {
            for (var a in Y)if (Y[A](a)) {
                var b = Y[a], c = b.node;
                ("svg" != b.type && !c.ownerSVGElement || "svg" == b.type && (!c.parentNode || "ownerSVGElement" in c.parentNode && !c.ownerSVGElement)) && delete Y[a]
            }
        }, 1e4), function (a) {
            function g(a) {
                function b(a, b) {
                    var c = e(a.node, b);
                    c = c && c.match(g), c = c && c[2], c && "#" == c.charAt() && (c = c.substring(1), c && (i[c] = (i[c] || []).concat(function (c) {
                        var d = {};
                        d[b] = Z(c), e(a.node, d)
                    })))
                }

                function c(a) {
                    var b = e(a.node, "xlink:href");
                    b && "#" == b.charAt() && (b = b.substring(1), b && (i[b] = (i[b] || []).concat(function (b) {
                        a.attr("xlink:href", "#" + b)
                    })))
                }

                for (var d, f = a.selectAll("*"), g = /^\s*url\(("|'|)(.*)\1\)\s*$/, h = [], i = {}, j = 0, k = f.length; k > j; j++) {
                    d = f[j], b(d, "fill"), b(d, "stroke"), b(d, "filter"), b(d, "mask"), b(d, "clip-path"), c(d);
                    var l = e(d.node, "id");
                    l && (e(d.node, {id: d.id}), h.push({old: l, id: d.id}))
                }
                for (j = 0, k = h.length; k > j; j++) {
                    var m = i[h[j].old];
                    if (m)for (var n = 0, o = m.length; o > n; n++)m[n](h[j].id)
                }
            }

            function h(a, b, c) {
                return function (d) {
                    var e = d.slice(a, b);
                    return 1 == e.length && (e = e[0]), c ? c(e) : e
                }
            }

            function i(a) {
                return function () {
                    var b = a ? "<" + this.type : "", c = this.node.attributes, d = this.node.childNodes;
                    if (a)for (var e = 0, f = c.length; f > e; e++)b += " " + c[e].name + '="' + c[e].value.replace(/"/g, '\\"') + '"';
                    if (d.length) {
                        for (a && (b += ">"), e = 0, f = d.length; f > e; e++)3 == d[e].nodeType ? b += d[e].nodeValue : 1 == d[e].nodeType && (b += y(d[e]).toString());
                        a && (b += "</" + this.type + ">")
                    } else a && (b += "/>");
                    return b
                }
            }

            a.attr = function (a, c) {
                {
                    var d = this;
                    d.node
                }
                if (!a)return d;
                if (f(a, "string")) {
                    if (!(arguments.length > 1))return b("snap.util.getattr." + a, d).firstDefined();
                    var e = {};
                    e[a] = c, a = e
                }
                for (var g in a)a[A](g) && b("snap.util.attr." + g, d, a[g]);
                return d
            }, a.getBBox = function (a) {
                if (!d.Matrix || !d.path)return this.node.getBBox();
                var b = this, c = new d.Matrix;
                if (b.removed)return d._.box();
                for (; "use" == b.type;)if (a || (c = c.add(b.transform().localMatrix.translate(b.attr("x") || 0, b.attr("y") || 0))), b.original)b = b.original; else {
                    var e = b.attr("xlink:href");
                    b = b.original = b.node.ownerDocument.getElementById(e.substring(e.indexOf("#") + 1))
                }
                var f = b._, g = d.path.get[b.type] || d.path.get.deflt;
                try {
                    return a ? (f.bboxwt = g ? d.path.getBBox(b.realPath = g(b)) : d._.box(b.node.getBBox()), d._.box(f.bboxwt)) : (b.realPath = g(b), b.matrix = b.transform().localMatrix, f.bbox = d.path.getBBox(d.path.map(b.realPath, c.add(b.matrix))), d._.box(f.bbox))
                } catch (h) {
                    return d._.box()
                }
            };
            var j = function () {
                return this.string
            };
            a.transform = function (a) {
                var b = this._;
                if (null == a) {
                    for (var c, f = this, g = new d.Matrix(this.node.getCTM()), h = p(this), i = [h], k = new d.Matrix, l = h.toTransformString(), m = B(h) == B(this.matrix) ? B(b.transform) : l; "svg" != f.type && (f = f.parent());)i.push(p(f));
                    for (c = i.length; c--;)k.add(i[c]);
                    return {
                        string: m,
                        globalMatrix: g,
                        totalMatrix: k,
                        localMatrix: h,
                        diffMatrix: g.clone().add(h.invert()),
                        global: g.toTransformString(),
                        total: k.toTransformString(),
                        local: l,
                        toString: j
                    }
                }
                return a instanceof d.Matrix ? this.matrix = a : p(this, a), this.node && ("linearGradient" == this.type || "radialGradient" == this.type ? e(this.node, {gradientTransform: this.matrix}) : "pattern" == this.type ? e(this.node, {patternTransform: this.matrix}) : e(this.node, {transform: this.matrix})), this
            }, a.parent = function () {
                return y(this.node.parentNode)
            }, a.append = a.add = function (a) {
                if (a) {
                    if ("set" == a.type) {
                        var b = this;
                        return a.forEach(function (a) {
                            b.add(a)
                        }), this
                    }
                    a = y(a), this.node.appendChild(a.node), a.paper = this.paper
                }
                return this
            }, a.appendTo = function (a) {
                return a && (a = y(a), a.append(this)), this
            }, a.prepend = function (a) {
                if (a) {
                    if ("set" == a.type) {
                        var b, c = this;
                        return a.forEach(function (a) {
                            b ? b.after(a) : c.prepend(a), b = a
                        }), this
                    }
                    a = y(a);
                    var d = a.parent();
                    this.node.insertBefore(a.node, this.node.firstChild), this.add && this.add(), a.paper = this.paper, this.parent() && this.parent().add(), d && d.add()
                }
                return this
            }, a.prependTo = function (a) {
                return a = y(a), a.prepend(this), this
            }, a.before = function (a) {
                if ("set" == a.type) {
                    var b = this;
                    return a.forEach(function (a) {
                        var c = a.parent();
                        b.node.parentNode.insertBefore(a.node, b.node), c && c.add()
                    }), this.parent().add(), this
                }
                a = y(a);
                var c = a.parent();
                return this.node.parentNode.insertBefore(a.node, this.node), this.parent() && this.parent().add(), c && c.add(), a.paper = this.paper, this
            }, a.after = function (a) {
                a = y(a);
                var b = a.parent();
                return this.node.nextSibling ? this.node.parentNode.insertBefore(a.node, this.node.nextSibling) : this.node.parentNode.appendChild(a.node), this.parent() && this.parent().add(), b && b.add(), a.paper = this.paper, this
            }, a.insertBefore = function (a) {
                a = y(a);
                var b = this.parent();
                return a.node.parentNode.insertBefore(this.node, a.node), this.paper = a.paper, b && b.add(), a.parent() && a.parent().add(), this
            }, a.insertAfter = function (a) {
                a = y(a);
                var b = this.parent();
                return a.node.parentNode.insertBefore(this.node, a.node.nextSibling), this.paper = a.paper, b && b.add(), a.parent() && a.parent().add(), this
            }, a.remove = function () {
                var a = this.parent();
                return this.node.parentNode && this.node.parentNode.removeChild(this.node), delete this.paper, this.removed = !0, a && a.add(), this
            }, a.select = function (a) {
                return y(this.node.querySelector(a))
            }, a.selectAll = function (a) {
                for (var b = this.node.querySelectorAll(a), c = (d.set || Array)(), e = 0; e < b.length; e++)c.push(y(b[e]));
                return c
            }, a.asPX = function (a, b) {
                return null == b && (b = this.attr(a)), +s(this, a, b)
            }, a.use = function () {
                var a, b = this.node.id;
                return b || (b = this.id, e(this.node, {id: b})), a = "linearGradient" == this.type || "radialGradient" == this.type || "pattern" == this.type ? w(this.type, this.node.parentNode) : w("use", this.node.parentNode), e(a.node, {"xlink:href": "#" + b}), a.original = this, a
            };
            var k = /\S+/g;
            a.addClass = function (a) {
                var b, c, d, e, f = (a || "").match(k) || [], g = this.node, h = g.className.baseVal, i = h.match(k) || [];
                if (f.length) {
                    for (b = 0; d = f[b++];)c = i.indexOf(d), ~c || i.push(d);
                    e = i.join(" "), h != e && (g.className.baseVal = e)
                }
                return this
            }, a.removeClass = function (a) {
                var b, c, d, e, f = (a || "").match(k) || [], g = this.node, h = g.className.baseVal, i = h.match(k) || [];
                if (i.length) {
                    for (b = 0; d = f[b++];)c = i.indexOf(d), ~c && i.splice(c, 1);
                    e = i.join(" "), h != e && (g.className.baseVal = e)
                }
                return this
            }, a.hasClass = function (a) {
                var b = this.node, c = b.className.baseVal, d = c.match(k) || [];
                return !!~d.indexOf(a)
            }, a.toggleClass = function (a, b) {
                if (null != b)return b ? this.addClass(a) : this.removeClass(a);
                var c, d, e, f, g = (a || "").match(k) || [], h = this.node, i = h.className.baseVal, j = i.match(k) || [];
                for (c = 0; e = g[c++];)d = j.indexOf(e), ~d ? j.splice(d, 1) : j.push(e);
                return f = j.join(" "), i != f && (h.className.baseVal = f), this
            }, a.clone = function () {
                var a = y(this.node.cloneNode(!0));
                return e(a.node, "id") && e(a.node, {id: a.id}), g(a), a.insertAfter(this), a
            }, a.toDefs = function () {
                var a = q(this);
                return a.appendChild(this.node), this
            }, a.pattern = a.toPattern = function (a, b, c, d) {
                var g = w("pattern", q(this));
                return null == a && (a = this.getBBox()), f(a, "object") && "x" in a && (b = a.y, c = a.width, d = a.height, a = a.x), e(g.node, {
                    x: a,
                    y: b,
                    width: c,
                    height: d,
                    patternUnits: "userSpaceOnUse",
                    id: g.id,
                    viewBox: [a, b, c, d].join(" ")
                }), g.node.appendChild(this.node), g
            }, a.marker = function (a, b, c, d, g, h) {
                var i = w("marker", q(this));
                return null == a && (a = this.getBBox()), f(a, "object") && "x" in a && (b = a.y, c = a.width, d = a.height, g = a.refX || a.cx, h = a.refY || a.cy, a = a.x), e(i.node, {
                    viewBox: [a, b, c, d].join(K),
                    markerWidth: c,
                    markerHeight: d,
                    orient: "auto",
                    refX: g || 0,
                    refY: h || 0,
                    id: i.id
                }), i.node.appendChild(this.node), i
            };
            var l = function (a, b, d, e) {
                "function" != typeof d || d.length || (e = d, d = c.linear), this.attr = a, this.dur = b, d && (this.easing = d), e && (this.callback = e)
            };
            d._.Animation = l, d.animation = function (a, b, c, d) {
                return new l(a, b, c, d)
            }, a.inAnim = function () {
                var a = this, b = [];
                for (var c in a.anims)a.anims[A](c) && !function (a) {
                    b.push({
                        anim: new l(a._attrs, a.dur, a.easing, a._callback),
                        mina: a,
                        curStatus: a.status(),
                        status: function (b) {
                            return a.status(b)
                        },
                        stop: function () {
                            a.stop()
                        }
                    })
                }(a.anims[c]);
                return b
            }, d.animate = function (a, d, e, f, g, h) {
                "function" != typeof g || g.length || (h = g, g = c.linear);
                var i = c.time(), j = c(a, d, i, i + f, c.time, e, g);
                return h && b.once("mina.finish." + j.id, h), j
            }, a.stop = function () {
                for (var a = this.inAnim(), b = 0, c = a.length; c > b; b++)a[b].stop();
                return this
            }, a.animate = function (a, d, e, g) {
                "function" != typeof e || e.length || (g = e, e = c.linear), a instanceof l && (g = a.callback, e = a.easing, d = e.dur, a = a.attr);
                var i, j, k, m, n = [], o = [], p = {}, q = this;
                for (var r in a)if (a[A](r)) {
                    q.equal ? (m = q.equal(r, B(a[r])), i = m.from, j = m.to, k = m.f) : (i = +q.attr(r), j = +a[r]);
                    var s = f(i, "array") ? i.length : 1;
                    p[r] = h(n.length, n.length + s, k), n = n.concat(i), o = o.concat(j)
                }
                var t = c.time(), u = c(n, o, t, t + d, c.time, function (a) {
                    var b = {};
                    for (var c in p)p[A](c) && (b[c] = p[c](a));
                    q.attr(b)
                }, e);
                return q.anims[u.id] = u, u._attrs = a, u._callback = g, b("snap.animcreated." + q.id, u), b.once("mina.finish." + u.id, function () {
                    delete q.anims[u.id], g && g.call(q)
                }), b.once("mina.stop." + u.id, function () {
                    delete q.anims[u.id]
                }), q
            };
            var m = {};
            a.data = function (a, c) {
                var e = m[this.id] = m[this.id] || {};
                if (0 == arguments.length)return b("snap.data.get." + this.id, this, e, null), e;
                if (1 == arguments.length) {
                    if (d.is(a, "object")) {
                        for (var f in a)a[A](f) && this.data(f, a[f]);
                        return this
                    }
                    return b("snap.data.get." + this.id, this, e[a], a), e[a]
                }
                return e[a] = c, b("snap.data.set." + this.id, this, c, a), this
            }, a.removeData = function (a) {
                return null == a ? m[this.id] = {} : m[this.id] && delete m[this.id][a], this
            }, a.outerSVG = a.toString = i(1), a.innerSVG = i()
        }(u.prototype), d.parse = function (a) {
            var b = z.doc.createDocumentFragment(), c = !0, d = z.doc.createElement("div");
            if (a = B(a), a.match(/^\s*<\s*svg(?:\s|>)/) || (a = "<svg>" + a + "</svg>", c = !1), d.innerHTML = a, a = d.getElementsByTagName("svg")[0])if (c)b = a; else for (; a.firstChild;)b.appendChild(a.firstChild);
            return d.innerHTML = J, new v(b)
        }, v.prototype.select = u.prototype.select, v.prototype.selectAll = u.prototype.selectAll, d.fragment = function () {
            for (var a = Array.prototype.slice.call(arguments, 0), b = z.doc.createDocumentFragment(), c = 0, e = a.length; e > c; c++) {
                var f = a[c];
                f.node && f.node.nodeType && b.appendChild(f.node), f.nodeType && b.appendChild(f), "string" == typeof f && b.appendChild(d.parse(f).node)
            }
            return new v(b)
        }, d._.make = w, d._.wrap = y, x.prototype.el = function (a, b) {
            var c = w(a, this.node);
            return b && c.attr(b), c
        }, b.on("snap.util.getattr", function () {
            var a = b.nt();
            a = a.substring(a.lastIndexOf(".") + 1);
            var c = a.replace(/[A-Z]/g, function (a) {
                return "-" + a.toLowerCase()
            });
            return fb[A](c) ? this.node.ownerDocument.defaultView.getComputedStyle(this.node, null).getPropertyValue(c) : e(this.node, a)
        });
        var fb = {
            "alignment-baseline": 0,
            "baseline-shift": 0,
            clip: 0,
            "clip-path": 0,
            "clip-rule": 0,
            color: 0,
            "color-interpolation": 0,
            "color-interpolation-filters": 0,
            "color-profile": 0,
            "color-rendering": 0,
            cursor: 0,
            direction: 0,
            display: 0,
            "dominant-baseline": 0,
            "enable-background": 0,
            fill: 0,
            "fill-opacity": 0,
            "fill-rule": 0,
            filter: 0,
            "flood-color": 0,
            "flood-opacity": 0,
            font: 0,
            "font-family": 0,
            "font-size": 0,
            "font-size-adjust": 0,
            "font-stretch": 0,
            "font-style": 0,
            "font-variant": 0,
            "font-weight": 0,
            "glyph-orientation-horizontal": 0,
            "glyph-orientation-vertical": 0,
            "image-rendering": 0,
            kerning: 0,
            "letter-spacing": 0,
            "lighting-color": 0,
            marker: 0,
            "marker-end": 0,
            "marker-mid": 0,
            "marker-start": 0,
            mask: 0,
            opacity: 0,
            overflow: 0,
            "pointer-events": 0,
            "shape-rendering": 0,
            "stop-color": 0,
            "stop-opacity": 0,
            stroke: 0,
            "stroke-dasharray": 0,
            "stroke-dashoffset": 0,
            "stroke-linecap": 0,
            "stroke-linejoin": 0,
            "stroke-miterlimit": 0,
            "stroke-opacity": 0,
            "stroke-width": 0,
            "text-anchor": 0,
            "text-decoration": 0,
            "text-rendering": 0,
            "unicode-bidi": 0,
            visibility: 0,
            "word-spacing": 0,
            "writing-mode": 0
        };
        b.on("snap.util.attr", function (a) {
            var c = b.nt(), d = {};
            c = c.substring(c.lastIndexOf(".") + 1), d[c] = a;
            var f = c.replace(/-(\w)/gi, function (a, b) {
                return b.toUpperCase()
            }), g = c.replace(/[A-Z]/g, function (a) {
                return "-" + a.toLowerCase()
            });
            fb[A](g) ? this.node.style[f] = null == a ? J : a : e(this.node, d)
        }), function () {
        }(x.prototype), d.ajax = function (a, c, d, e) {
            var g = new XMLHttpRequest, h = V();
            if (g) {
                if (f(c, "function"))e = d, d = c, c = null; else if (f(c, "object")) {
                    var i = [];
                    for (var j in c)c.hasOwnProperty(j) && i.push(encodeURIComponent(j) + "=" + encodeURIComponent(c[j]));
                    c = i.join("&")
                }
                return g.open(c ? "POST" : "GET", a, !0), c && (g.setRequestHeader("X-Requested-With", "XMLHttpRequest"), g.setRequestHeader("Content-type", "application/x-www-form-urlencoded")), d && (b.once("snap.ajax." + h + ".0", d), b.once("snap.ajax." + h + ".200", d), b.once("snap.ajax." + h + ".304", d)), g.onreadystatechange = function () {
                    4 == g.readyState && b("snap.ajax." + h + "." + g.status, e, g)
                }, 4 == g.readyState ? g : (g.send(c), g)
            }
        }, d.load = function (a, b, c) {
            d.ajax(a, function (a) {
                var e = d.parse(a.responseText);
                c ? b.call(c, e) : b(e)
            })
        };
        var gb = function (a) {
            var b = a.getBoundingClientRect(), c = a.ownerDocument, d = c.body, e = c.documentElement, f = e.clientTop || d.clientTop || 0, h = e.clientLeft || d.clientLeft || 0, i = b.top + (g.win.pageYOffset || e.scrollTop || d.scrollTop) - f, j = b.left + (g.win.pageXOffset || e.scrollLeft || d.scrollLeft) - h;
            return {y: i, x: j}
        };
        return d.getElementByPoint = function (a, b) {
            var c = this, d = (c.canvas, z.doc.elementFromPoint(a, b));
            if (z.win.opera && "svg" == d.tagName) {
                var e = gb(d), f = d.createSVGRect();
                f.x = a - e.x, f.y = b - e.y, f.width = f.height = 1;
                var g = d.getIntersectionList(f, null);
                g.length && (d = g[g.length - 1])
            }
            return d ? y(d) : null
        }, d.plugin = function (a) {
            a(d, u, x, z, v)
        }, z.win.Snap = d, d
    }();
    return d.plugin(function (a) {
        function b(a, b, d, e, f, g) {
            return null == b && "[object SVGMatrix]" == c.call(a) ? (this.a = a.a, this.b = a.b, this.c = a.c, this.d = a.d, this.e = a.e, void(this.f = a.f)) : void(null != a ? (this.a = +a, this.b = +b, this.c = +d, this.d = +e, this.e = +f, this.f = +g) : (this.a = 1, this.b = 0, this.c = 0, this.d = 1, this.e = 0, this.f = 0))
        }

        var c = Object.prototype.toString, d = String, e = Math, f = "";
        !function (c) {
            function g(a) {
                return a[0] * a[0] + a[1] * a[1]
            }

            function h(a) {
                var b = e.sqrt(g(a));
                a[0] && (a[0] /= b), a[1] && (a[1] /= b)
            }

            c.add = function (a, c, d, e, f, g) {
                var h, i, j, k, l = [[], [], []], m = [[this.a, this.c, this.e], [this.b, this.d, this.f], [0, 0, 1]], n = [[a, d, f], [c, e, g], [0, 0, 1]];
                for (a && a instanceof b && (n = [[a.a, a.c, a.e], [a.b, a.d, a.f], [0, 0, 1]]), h = 0; 3 > h; h++)for (i = 0; 3 > i; i++) {
                    for (k = 0, j = 0; 3 > j; j++)k += m[h][j] * n[j][i];
                    l[h][i] = k
                }
                return this.a = l[0][0], this.b = l[1][0], this.c = l[0][1], this.d = l[1][1], this.e = l[0][2], this.f = l[1][2], this
            }, c.invert = function () {
                var a = this, c = a.a * a.d - a.b * a.c;
                return new b(a.d / c, -a.b / c, -a.c / c, a.a / c, (a.c * a.f - a.d * a.e) / c, (a.b * a.e - a.a * a.f) / c)
            }, c.clone = function () {
                return new b(this.a, this.b, this.c, this.d, this.e, this.f)
            }, c.translate = function (a, b) {
                return this.add(1, 0, 0, 1, a, b)
            }, c.scale = function (a, b, c, d) {
                return null == b && (b = a), (c || d) && this.add(1, 0, 0, 1, c, d), this.add(a, 0, 0, b, 0, 0), (c || d) && this.add(1, 0, 0, 1, -c, -d), this
            }, c.rotate = function (b, c, d) {
                b = a.rad(b), c = c || 0, d = d || 0;
                var f = +e.cos(b).toFixed(9), g = +e.sin(b).toFixed(9);
                return this.add(f, g, -g, f, c, d), this.add(1, 0, 0, 1, -c, -d)
            }, c.x = function (a, b) {
                return a * this.a + b * this.c + this.e
            }, c.y = function (a, b) {
                return a * this.b + b * this.d + this.f
            }, c.get = function (a) {
                return +this[d.fromCharCode(97 + a)].toFixed(4)
            }, c.toString = function () {
                return "matrix(" + [this.get(0), this.get(1), this.get(2), this.get(3), this.get(4), this.get(5)].join() + ")"
            }, c.offset = function () {
                return [this.e.toFixed(4), this.f.toFixed(4)]
            }, c.determinant = function () {
                return this.a * this.d - this.b * this.c
            }, c.split = function () {
                var b = {};
                b.dx = this.e, b.dy = this.f;
                var c = [[this.a, this.c], [this.b, this.d]];
                b.scalex = e.sqrt(g(c[0])), h(c[0]), b.shear = c[0][0] * c[1][0] + c[0][1] * c[1][1], c[1] = [c[1][0] - c[0][0] * b.shear, c[1][1] - c[0][1] * b.shear], b.scaley = e.sqrt(g(c[1])), h(c[1]), b.shear /= b.scaley, this.determinant() < 0 && (b.scalex = -b.scalex);
                var d = -c[0][1], f = c[1][1];
                return 0 > f ? (b.rotate = a.deg(e.acos(f)), 0 > d && (b.rotate = 360 - b.rotate)) : b.rotate = a.deg(e.asin(d)), b.isSimple = !(+b.shear.toFixed(9) || b.scalex.toFixed(9) != b.scaley.toFixed(9) && b.rotate), b.isSuperSimple = !+b.shear.toFixed(9) && b.scalex.toFixed(9) == b.scaley.toFixed(9) && !b.rotate, b.noRotation = !+b.shear.toFixed(9) && !b.rotate, b
            }, c.toTransformString = function (a) {
                var b = a || this.split();
                return +b.shear.toFixed(9) ? "m" + [this.get(0), this.get(1), this.get(2), this.get(3), this.get(4), this.get(5)] : (b.scalex = +b.scalex.toFixed(4), b.scaley = +b.scaley.toFixed(4), b.rotate = +b.rotate.toFixed(4), (b.dx || b.dy ? "t" + [+b.dx.toFixed(4), +b.dy.toFixed(4)] : f) + (1 != b.scalex || 1 != b.scaley ? "s" + [b.scalex, b.scaley, 0, 0] : f) + (b.rotate ? "r" + [+b.rotate.toFixed(4), 0, 0] : f))
            }
        }(b.prototype), a.Matrix = b, a.matrix = function (a, c, d, e, f, g) {
            return new b(a, c, d, e, f, g)
        }
    }), d.plugin(function (a, c, d, e, f) {
        function g(d) {
            return function (e) {
                if (b.stop(), e instanceof f && 1 == e.node.childNodes.length && ("radialGradient" == e.node.firstChild.tagName || "linearGradient" == e.node.firstChild.tagName || "pattern" == e.node.firstChild.tagName) && (e = e.node.firstChild, n(this).appendChild(e), e = l(e)), e instanceof c)if ("radialGradient" == e.type || "linearGradient" == e.type || "pattern" == e.type) {
                    e.node.id || p(e.node, {id: e.id});
                    var g = q(e.node.id)
                } else g = e.attr(d); else if (g = a.color(e), g.error) {
                    var h = a(n(this).ownerSVGElement).gradient(e);
                    h ? (h.node.id || p(h.node, {id: h.id}), g = q(h.node.id)) : g = e
                } else g = r(g);
                var i = {};
                i[d] = g, p(this.node, i), this.node.style[d] = t
            }
        }

        function h(a) {
            b.stop(), a == +a && (a += "px"), this.node.style.fontSize = a
        }

        function i(a) {
            for (var b = [], c = a.childNodes, d = 0, e = c.length; e > d; d++) {
                var f = c[d];
                3 == f.nodeType && b.push(f.nodeValue), "tspan" == f.tagName && b.push(1 == f.childNodes.length && 3 == f.firstChild.nodeType ? f.firstChild.nodeValue : i(f))
            }
            return b
        }

        function j() {
            return b.stop(), this.node.style.fontSize
        }

        var k = a._.make, l = a._.wrap, m = a.is, n = a._.getSomeDefs, o = /^url\(#?([^)]+)\)$/, p = a._.$, q = a.url, r = String, s = a._.separator, t = "";
        b.on("snap.util.attr.mask", function (a) {
            if (a instanceof c || a instanceof f) {
                if (b.stop(), a instanceof f && 1 == a.node.childNodes.length && (a = a.node.firstChild, n(this).appendChild(a), a = l(a)), "mask" == a.type)var d = a; else d = k("mask", n(this)), d.node.appendChild(a.node);
                !d.node.id && p(d.node, {id: d.id}), p(this.node, {mask: q(d.id)})
            }
        }), function (a) {
            b.on("snap.util.attr.clip", a), b.on("snap.util.attr.clip-path", a), b.on("snap.util.attr.clipPath", a)
        }(function (a) {
            if (a instanceof c || a instanceof f) {
                if (b.stop(), "clipPath" == a.type)var d = a; else d = k("clipPath", n(this)), d.node.appendChild(a.node), !d.node.id && p(d.node, {id: d.id});
                p(this.node, {"clip-path": q(d.id)})
            }
        }), b.on("snap.util.attr.fill", g("fill")), b.on("snap.util.attr.stroke", g("stroke"));
        var u = /^([lr])(?:\(([^)]*)\))?(.*)$/i;
        b.on("snap.util.grad.parse", function (a) {
            a = r(a);
            var b = a.match(u);
            if (!b)return null;
            var c = b[1], d = b[2], e = b[3];
            return d = d.split(/\s*,\s*/).map(function (a) {
                return +a == a ? +a : a
            }), 1 == d.length && 0 == d[0] && (d = []), e = e.split("-"), e = e.map(function (a) {
                a = a.split(":");
                var b = {color: a[0]};
                return a[1] && (b.offset = parseFloat(a[1])), b
            }), {type: c, params: d, stops: e}
        }), b.on("snap.util.attr.d", function (c) {
            b.stop(), m(c, "array") && m(c[0], "array") && (c = a.path.toString.call(c)), c = r(c), c.match(/[ruo]/i) && (c = a.path.toAbsolute(c)), p(this.node, {d: c})
        })(-1), b.on("snap.util.attr.#text", function (a) {
            b.stop(), a = r(a);
            for (var c = e.doc.createTextNode(a); this.node.firstChild;)this.node.removeChild(this.node.firstChild);
            this.node.appendChild(c)
        })(-1), b.on("snap.util.attr.path", function (a) {
            b.stop(), this.attr({d: a})
        })(-1), b.on("snap.util.attr.class", function (a) {
            b.stop(), this.node.className.baseVal = a
        })(-1), b.on("snap.util.attr.viewBox", function (a) {
            var c;
            c = m(a, "object") && "x" in a ? [a.x, a.y, a.width, a.height].join(" ") : m(a, "array") ? a.join(" ") : a, p(this.node, {viewBox: c}), b.stop()
        })(-1), b.on("snap.util.attr.transform", function (a) {
            this.transform(a), b.stop()
        })(-1), b.on("snap.util.attr.r", function (a) {
            "rect" == this.type && (b.stop(), p(this.node, {rx: a, ry: a}))
        })(-1), b.on("snap.util.attr.textpath", function (a) {
            if (b.stop(), "text" == this.type) {
                var d, e, f;
                if (!a && this.textPath) {
                    for (e = this.textPath; e.node.firstChild;)this.node.appendChild(e.node.firstChild);
                    return e.remove(), void delete this.textPath
                }
                if (m(a, "string")) {
                    var g = n(this), h = l(g.parentNode).path(a);
                    g.appendChild(h.node), d = h.id, h.attr({id: d})
                } else a = l(a), a instanceof c && (d = a.attr("id"), d || (d = a.id, a.attr({id: d})));
                if (d)if (e = this.textPath, f = this.node, e)e.attr({"xlink:href": "#" + d}); else {
                    for (e = p("textPath", {"xlink:href": "#" + d}); f.firstChild;)e.appendChild(f.firstChild);
                    f.appendChild(e), this.textPath = l(e)
                }
            }
        })(-1), b.on("snap.util.attr.text", function (a) {
            if ("text" == this.type) {
                for (var c = this.node, d = function (a) {
                    var b = p("tspan");
                    if (m(a, "array"))for (var c = 0; c < a.length; c++)b.appendChild(d(a[c])); else b.appendChild(e.doc.createTextNode(a));
                    return b.normalize && b.normalize(), b
                }; c.firstChild;)c.removeChild(c.firstChild);
                for (var f = d(a); f.firstChild;)c.appendChild(f.firstChild)
            }
            b.stop()
        })(-1), b.on("snap.util.attr.fontSize", h)(-1), b.on("snap.util.attr.font-size", h)(-1), b.on("snap.util.getattr.transform", function () {
            return b.stop(), this.transform()
        })(-1), b.on("snap.util.getattr.textpath", function () {
            return b.stop(), this.textPath
        })(-1), function () {
            function c(c) {
                return function () {
                    b.stop();
                    var d = e.doc.defaultView.getComputedStyle(this.node, null).getPropertyValue("marker-" + c);
                    return "none" == d ? d : a(e.doc.getElementById(d.match(o)[1]))
                }
            }

            function d(a) {
                return function (c) {
                    b.stop();
                    var d = "marker" + a.charAt(0).toUpperCase() + a.substring(1);
                    if ("" == c || !c)return void(this.node.style[d] = "none");
                    if ("marker" == c.type) {
                        var e = c.node.id;
                        return e || p(c.node, {id: c.id}), void(this.node.style[d] = q(e))
                    }
                }
            }

            b.on("snap.util.getattr.marker-end", c("end"))(-1), b.on("snap.util.getattr.markerEnd", c("end"))(-1), b.on("snap.util.getattr.marker-start", c("start"))(-1), b.on("snap.util.getattr.markerStart", c("start"))(-1), b.on("snap.util.getattr.marker-mid", c("mid"))(-1), b.on("snap.util.getattr.markerMid", c("mid"))(-1), b.on("snap.util.attr.marker-end", d("end"))(-1), b.on("snap.util.attr.markerEnd", d("end"))(-1), b.on("snap.util.attr.marker-start", d("start"))(-1), b.on("snap.util.attr.markerStart", d("start"))(-1), b.on("snap.util.attr.marker-mid", d("mid"))(-1), b.on("snap.util.attr.markerMid", d("mid"))(-1)
        }(), b.on("snap.util.getattr.r", function () {
            return "rect" == this.type && p(this.node, "rx") == p(this.node, "ry") ? (b.stop(), p(this.node, "rx")) : void 0
        })(-1), b.on("snap.util.getattr.text", function () {
            if ("text" == this.type || "tspan" == this.type) {
                b.stop();
                var a = i(this.node);
                return 1 == a.length ? a[0] : a
            }
        })(-1), b.on("snap.util.getattr.#text", function () {
            return this.node.textContent
        })(-1), b.on("snap.util.getattr.viewBox", function () {
            b.stop();
            var c = p(this.node, "viewBox");
            return c ? (c = c.split(s), a._.box(+c[0], +c[1], +c[2], +c[3])) : void 0
        })(-1), b.on("snap.util.getattr.points", function () {
            var a = p(this.node, "points");
            return b.stop(), a ? a.split(s) : void 0
        })(-1), b.on("snap.util.getattr.path", function () {
            var a = p(this.node, "d");
            return b.stop(), a
        })(-1), b.on("snap.util.getattr.class", function () {
            return this.node.className.baseVal
        })(-1), b.on("snap.util.getattr.fontSize", j)(-1), b.on("snap.util.getattr.font-size", j)(-1)
    }), d.plugin(function () {
        function a(a) {
            return a
        }

        function c(a) {
            return function (b) {
                return +b.toFixed(3) + a
            }
        }

        var d = {
            "+": function (a, b) {
                return a + b
            }, "-": function (a, b) {
                return a - b
            }, "/": function (a, b) {
                return a / b
            }, "*": function (a, b) {
                return a * b
            }
        }, e = String, f = /[a-z]+$/i, g = /^\s*([+\-\/*])\s*=\s*([\d.eE+\-]+)\s*([^\d\s]+)?\s*$/;
        b.on("snap.util.attr", function (a) {
            var c = e(a).match(g);
            if (c) {
                var h = b.nt(), i = h.substring(h.lastIndexOf(".") + 1), j = this.attr(i), k = {};
                b.stop();
                var l = c[3] || "", m = j.match(f), n = d[c[1]];
                if (m && m == l ? a = n(parseFloat(j), +c[2]) : (j = this.asPX(i), a = n(this.asPX(i), this.asPX(i, c[2] + l))), isNaN(j) || isNaN(a))return;
                k[i] = a, this.attr(k)
            }
        })(-10), b.on("snap.util.equal", function (h, i) {
            var j = e(this.attr(h) || ""), k = e(i).match(g);
            if (k) {
                b.stop();
                var l = k[3] || "", m = j.match(f), n = d[k[1]];
                return m && m == l ? {
                    from: parseFloat(j),
                    to: n(parseFloat(j), +k[2]),
                    f: c(m)
                } : (j = this.asPX(h), {from: j, to: n(j, this.asPX(h, k[2] + l)), f: a})
            }
        })(-10)
    }), d.plugin(function (a, c, d, e) {
        var f = d.prototype, g = a.is;
        f.rect = function (a, b, c, d, e, f) {
            var h;
            return null == f && (f = e), g(a, "object") && "[object Object]" == a ? h = a : null != a && (h = {
                x: a,
                y: b,
                width: c,
                height: d
            }, null != e && (h.rx = e, h.ry = f)), this.el("rect", h)
        }, f.circle = function (a, b, c) {
            var d;
            return g(a, "object") && "[object Object]" == a ? d = a : null != a && (d = {
                cx: a,
                cy: b,
                r: c
            }), this.el("circle", d)
        };
        var h = function () {
            function a() {
                this.parentNode.removeChild(this)
            }

            return function (b, c) {
                var d = e.doc.createElement("img"), f = e.doc.body;
                d.style.cssText = "position:absolute;left:-9999em;top:-9999em", d.onload = function () {
                    c.call(d), d.onload = d.onerror = null, f.removeChild(d)
                }, d.onerror = a, f.appendChild(d), d.src = b
            }
        }();
        f.image = function (b, c, d, e, f) {
            var i = this.el("image");
            if (g(b, "object") && "src" in b)i.attr(b); else if (null != b) {
                var j = {"xlink:href": b, preserveAspectRatio: "none"};
                null != c && null != d && (j.x = c, j.y = d), null != e && null != f ? (j.width = e, j.height = f) : h(b, function () {
                    a._.$(i.node, {width: this.offsetWidth, height: this.offsetHeight})
                }), a._.$(i.node, j)
            }
            return i
        }, f.ellipse = function (a, b, c, d) {
            var e;
            return g(a, "object") && "[object Object]" == a ? e = a : null != a && (e = {
                cx: a,
                cy: b,
                rx: c,
                ry: d
            }), this.el("ellipse", e)
        }, f.path = function (a) {
            var b;
            return g(a, "object") && !g(a, "array") ? b = a : a && (b = {d: a}), this.el("path", b)
        }, f.group = f.g = function (a) {
            var b = this.el("g");
            return 1 == arguments.length && a && !a.type ? b.attr(a) : arguments.length && b.add(Array.prototype.slice.call(arguments, 0)), b
        }, f.svg = function (a, b, c, d, e, f, h, i) {
            var j = {};
            return g(a, "object") && null == b ? j = a : (null != a && (j.x = a), null != b && (j.y = b), null != c && (j.width = c), null != d && (j.height = d), null != e && null != f && null != h && null != i && (j.viewBox = [e, f, h, i])), this.el("svg", j)
        }, f.mask = function (a) {
            var b = this.el("mask");
            return 1 == arguments.length && a && !a.type ? b.attr(a) : arguments.length && b.add(Array.prototype.slice.call(arguments, 0)), b
        }, f.ptrn = function (a, b, c, d, e, f, h, i) {
            if (g(a, "object"))var j = a; else arguments.length ? (j = {}, null != a && (j.x = a), null != b && (j.y = b), null != c && (j.width = c), null != d && (j.height = d), null != e && null != f && null != h && null != i && (j.viewBox = [e, f, h, i])) : j = {patternUnits: "userSpaceOnUse"};
            return this.el("pattern", j)
        }, f.use = function (a) {
            if (null != a) {
                {
                    make("use", this.node)
                }
                return a instanceof c && (a.attr("id") || a.attr({id: ID()}), a = a.attr("id")), this.el("use", {"xlink:href": a})
            }
            return c.prototype.use.call(this)
        }, f.text = function (a, b, c) {
            var d = {};
            return g(a, "object") ? d = a : null != a && (d = {x: a, y: b, text: c || ""}), this.el("text", d)
        }, f.line = function (a, b, c, d) {
            var e = {};
            return g(a, "object") ? e = a : null != a && (e = {x1: a, x2: c, y1: b, y2: d}), this.el("line", e)
        }, f.polyline = function (a) {
            arguments.length > 1 && (a = Array.prototype.slice.call(arguments, 0));
            var b = {};
            return g(a, "object") && !g(a, "array") ? b = a : null != a && (b = {points: a}), this.el("polyline", b)
        }, f.polygon = function (a) {
            arguments.length > 1 && (a = Array.prototype.slice.call(arguments, 0));
            var b = {};
            return g(a, "object") && !g(a, "array") ? b = a : null != a && (b = {points: a}), this.el("polygon", b)
        }, function () {
            function c() {
                return this.selectAll("stop")
            }

            function d(b, c) {
                var d = j("stop"), e = {offset: +c + "%"};
                return b = a.color(b), e["stop-color"] = b.hex, b.opacity < 1 && (e["stop-opacity"] = b.opacity), j(d, e), this.node.appendChild(d), this
            }

            function e() {
                if ("linearGradient" == this.type) {
                    var b = j(this.node, "x1") || 0, c = j(this.node, "x2") || 1, d = j(this.node, "y1") || 0, e = j(this.node, "y2") || 0;
                    return a._.box(b, d, math.abs(c - b), math.abs(e - d))
                }
                var f = this.node.cx || .5, g = this.node.cy || .5, h = this.node.r || 0;
                return a._.box(f - h, g - h, 2 * h, 2 * h)
            }

            function g(a, c) {
                function d(a, b) {
                    for (var c = (b - l) / (a - m), d = m; a > d; d++)g[d].offset = +(+l + c * (d - m)).toFixed(2);
                    m = a, l = b
                }

                var e, f = b("snap.util.grad.parse", null, c).firstDefined();
                if (!f)return null;
                f.params.unshift(a), e = "l" == f.type.toLowerCase() ? h.apply(0, f.params) : i.apply(0, f.params), f.type != f.type.toLowerCase() && j(e.node, {gradientUnits: "userSpaceOnUse"});
                var g = f.stops, k = g.length, l = 0, m = 0;
                k--;
                for (var n = 0; k > n; n++)"offset" in g[n] && d(n, g[n].offset);
                for (g[k].offset = g[k].offset || 100, d(k, g[k].offset), n = 0; k >= n; n++) {
                    var o = g[n];
                    e.addStop(o.color, o.offset)
                }
                return e
            }

            function h(b, f, g, h, i) {
                var k = a._.make("linearGradient", b);
                return k.stops = c, k.addStop = d, k.getBBox = e, null != f && j(k.node, {
                    x1: f,
                    y1: g,
                    x2: h,
                    y2: i
                }), k
            }

            function i(b, f, g, h, i, k) {
                var l = a._.make("radialGradient", b);
                return l.stops = c, l.addStop = d, l.getBBox = e, null != f && j(l.node, {
                    cx: f,
                    cy: g,
                    r: h
                }), null != i && null != k && j(l.node, {fx: i, fy: k}), l
            }

            var j = a._.$;
            f.gradient = function (a) {
                return g(this.defs, a)
            }, f.gradientLinear = function (a, b, c, d) {
                return h(this.defs, a, b, c, d)
            }, f.gradientRadial = function (a, b, c, d, e) {
                return i(this.defs, a, b, c, d, e)
            }, f.toString = function () {
                var b, c = this.node.ownerDocument, d = c.createDocumentFragment(), e = c.createElement("div"), f = this.node.cloneNode(!0);
                return d.appendChild(e), e.appendChild(f), a._.$(f, {xmlns: "http://www.w3.org/2000/svg"}), b = e.innerHTML, d.removeChild(d.firstChild), b
            }, f.clear = function () {
                for (var a, b = this.node.firstChild; b;)a = b.nextSibling, "defs" != b.tagName ? b.parentNode.removeChild(b) : f.clear.call({node: b}), b = a
            }
        }()
    }), d.plugin(function (a, b) {
        function c(a) {
            var b = c.ps = c.ps || {};
            return b[a] ? b[a].sleep = 100 : b[a] = {sleep: 100}, setTimeout(function () {
                for (var c in b)b[K](c) && c != a && (b[c].sleep--, !b[c].sleep && delete b[c])
            }), b[a]
        }

        function d(a, b, c, d) {
            return null == a && (a = b = c = d = 0), null == b && (b = a.y, c = a.width, d = a.height, a = a.x), {
                x: a,
                y: b,
                width: c,
                w: c,
                height: d,
                h: d,
                x2: a + c,
                y2: b + d,
                cx: a + c / 2,
                cy: b + d / 2,
                r1: N.min(c, d) / 2,
                r2: N.max(c, d) / 2,
                r0: N.sqrt(c * c + d * d) / 2,
                path: w(a, b, c, d),
                vb: [a, b, c, d].join(" ")
            }
        }

        function e() {
            return this.join(",").replace(L, "$1")
        }

        function f(a) {
            var b = J(a);
            return b.toString = e, b
        }

        function g(a, b, c, d, e, f, g, h, j) {
            return null == j ? n(a, b, c, d, e, f, g, h) : i(a, b, c, d, e, f, g, h, o(a, b, c, d, e, f, g, h, j))
        }

        function h(c, d) {
            function e(a) {
                return +(+a).toFixed(3)
            }

            return a._.cacher(function (a, f, h) {
                a instanceof b && (a = a.attr("d")), a = E(a);
                for (var j, k, l, m, n, o = "", p = {}, q = 0, r = 0, s = a.length; s > r; r++) {
                    if (l = a[r], "M" == l[0])j = +l[1], k = +l[2]; else {
                        if (m = g(j, k, l[1], l[2], l[3], l[4], l[5], l[6]), q + m > f) {
                            if (d && !p.start) {
                                if (n = g(j, k, l[1], l[2], l[3], l[4], l[5], l[6], f - q), o += ["C" + e(n.start.x), e(n.start.y), e(n.m.x), e(n.m.y), e(n.x), e(n.y)], h)return o;
                                p.start = o, o = ["M" + e(n.x), e(n.y) + "C" + e(n.n.x), e(n.n.y), e(n.end.x), e(n.end.y), e(l[5]), e(l[6])].join(), q += m, j = +l[5], k = +l[6];
                                continue
                            }
                            if (!c && !d)return n = g(j, k, l[1], l[2], l[3], l[4], l[5], l[6], f - q)
                        }
                        q += m, j = +l[5], k = +l[6]
                    }
                    o += l.shift() + l
                }
                return p.end = o, n = c ? q : d ? p : i(j, k, l[0], l[1], l[2], l[3], l[4], l[5], 1)
            }, null, a._.clone)
        }

        function i(a, b, c, d, e, f, g, h, i) {
            var j = 1 - i, k = R(j, 3), l = R(j, 2), m = i * i, n = m * i, o = k * a + 3 * l * i * c + 3 * j * i * i * e + n * g, p = k * b + 3 * l * i * d + 3 * j * i * i * f + n * h, q = a + 2 * i * (c - a) + m * (e - 2 * c + a), r = b + 2 * i * (d - b) + m * (f - 2 * d + b), s = c + 2 * i * (e - c) + m * (g - 2 * e + c), t = d + 2 * i * (f - d) + m * (h - 2 * f + d), u = j * a + i * c, v = j * b + i * d, w = j * e + i * g, x = j * f + i * h, y = 90 - 180 * N.atan2(q - s, r - t) / O;
            return {x: o, y: p, m: {x: q, y: r}, n: {x: s, y: t}, start: {x: u, y: v}, end: {x: w, y: x}, alpha: y}
        }

        function j(b, c, e, f, g, h, i, j) {
            a.is(b, "array") || (b = [b, c, e, f, g, h, i, j]);
            var k = D.apply(null, b);
            return d(k.min.x, k.min.y, k.max.x - k.min.x, k.max.y - k.min.y)
        }

        function k(a, b, c) {
            return b >= a.x && b <= a.x + a.width && c >= a.y && c <= a.y + a.height
        }

        function l(a, b) {
            return a = d(a), b = d(b), k(b, a.x, a.y) || k(b, a.x2, a.y) || k(b, a.x, a.y2) || k(b, a.x2, a.y2) || k(a, b.x, b.y) || k(a, b.x2, b.y) || k(a, b.x, b.y2) || k(a, b.x2, b.y2) || (a.x < b.x2 && a.x > b.x || b.x < a.x2 && b.x > a.x) && (a.y < b.y2 && a.y > b.y || b.y < a.y2 && b.y > a.y)
        }

        function m(a, b, c, d, e) {
            var f = -3 * b + 9 * c - 9 * d + 3 * e, g = a * f + 6 * b - 12 * c + 6 * d;
            return a * g - 3 * b + 3 * c
        }

        function n(a, b, c, d, e, f, g, h, i) {
            null == i && (i = 1), i = i > 1 ? 1 : 0 > i ? 0 : i;
            for (var j = i / 2, k = 12, l = [-.1252, .1252, -.3678, .3678, -.5873, .5873, -.7699, .7699, -.9041, .9041, -.9816, .9816], n = [.2491, .2491, .2335, .2335, .2032, .2032, .1601, .1601, .1069, .1069, .0472, .0472], o = 0, p = 0; k > p; p++) {
                var q = j * l[p] + j, r = m(q, a, c, e, g), s = m(q, b, d, f, h), t = r * r + s * s;
                o += n[p] * N.sqrt(t)
            }
            return j * o
        }

        function o(a, b, c, d, e, f, g, h, i) {
            if (!(0 > i || n(a, b, c, d, e, f, g, h) < i)) {
                var j, k = 1, l = k / 2, m = k - l, o = .01;
                for (j = n(a, b, c, d, e, f, g, h, m); S(j - i) > o;)l /= 2, m += (i > j ? 1 : -1) * l, j = n(a, b, c, d, e, f, g, h, m);
                return m
            }
        }

        function p(a, b, c, d, e, f, g, h) {
            if (!(Q(a, c) < P(e, g) || P(a, c) > Q(e, g) || Q(b, d) < P(f, h) || P(b, d) > Q(f, h))) {
                var i = (a * d - b * c) * (e - g) - (a - c) * (e * h - f * g), j = (a * d - b * c) * (f - h) - (b - d) * (e * h - f * g), k = (a - c) * (f - h) - (b - d) * (e - g);
                if (k) {
                    var l = i / k, m = j / k, n = +l.toFixed(2), o = +m.toFixed(2);
                    if (!(n < +P(a, c).toFixed(2) || n > +Q(a, c).toFixed(2) || n < +P(e, g).toFixed(2) || n > +Q(e, g).toFixed(2) || o < +P(b, d).toFixed(2) || o > +Q(b, d).toFixed(2) || o < +P(f, h).toFixed(2) || o > +Q(f, h).toFixed(2)))return {
                        x: l,
                        y: m
                    }
                }
            }
        }

        function q(a, b, c) {
            var d = j(a), e = j(b);
            if (!l(d, e))return c ? 0 : [];
            for (var f = n.apply(0, a), g = n.apply(0, b), h = ~~(f / 8), k = ~~(g / 8), m = [], o = [], q = {}, r = c ? 0 : [], s = 0; h + 1 > s; s++) {
                var t = i.apply(0, a.concat(s / h));
                m.push({x: t.x, y: t.y, t: s / h})
            }
            for (s = 0; k + 1 > s; s++)t = i.apply(0, b.concat(s / k)), o.push({x: t.x, y: t.y, t: s / k});
            for (s = 0; h > s; s++)for (var u = 0; k > u; u++) {
                var v = m[s], w = m[s + 1], x = o[u], y = o[u + 1], z = S(w.x - v.x) < .001 ? "y" : "x", A = S(y.x - x.x) < .001 ? "y" : "x", B = p(v.x, v.y, w.x, w.y, x.x, x.y, y.x, y.y);
                if (B) {
                    if (q[B.x.toFixed(4)] == B.y.toFixed(4))continue;
                    q[B.x.toFixed(4)] = B.y.toFixed(4);
                    var C = v.t + S((B[z] - v[z]) / (w[z] - v[z])) * (w.t - v.t), D = x.t + S((B[A] - x[A]) / (y[A] - x[A])) * (y.t - x.t);
                    C >= 0 && 1 >= C && D >= 0 && 1 >= D && (c ? r++ : r.push({x: B.x, y: B.y, t1: C, t2: D}))
                }
            }
            return r
        }

        function r(a, b) {
            return t(a, b)
        }

        function s(a, b) {
            return t(a, b, 1)
        }

        function t(a, b, c) {
            a = E(a), b = E(b);
            for (var d, e, f, g, h, i, j, k, l, m, n = c ? 0 : [], o = 0, p = a.length; p > o; o++) {
                var r = a[o];
                if ("M" == r[0])d = h = r[1], e = i = r[2]; else {
                    "C" == r[0] ? (l = [d, e].concat(r.slice(1)), d = l[6], e = l[7]) : (l = [d, e, d, e, h, i, h, i], d = h, e = i);
                    for (var s = 0, t = b.length; t > s; s++) {
                        var u = b[s];
                        if ("M" == u[0])f = j = u[1], g = k = u[2]; else {
                            "C" == u[0] ? (m = [f, g].concat(u.slice(1)), f = m[6], g = m[7]) : (m = [f, g, f, g, j, k, j, k], f = j, g = k);
                            var v = q(l, m, c);
                            if (c)n += v; else {
                                for (var w = 0, x = v.length; x > w; w++)v[w].segment1 = o, v[w].segment2 = s, v[w].bez1 = l, v[w].bez2 = m;
                                n = n.concat(v)
                            }
                        }
                    }
                }
            }
            return n
        }

        function u(a, b, c) {
            var d = v(a);
            return k(d, b, c) && t(a, [["M", b, c], ["H", d.x2 + 10]], 1) % 2 == 1
        }

        function v(a) {
            var b = c(a);
            if (b.bbox)return J(b.bbox);
            if (!a)return d();
            a = E(a);
            for (var e, f = 0, g = 0, h = [], i = [], j = 0, k = a.length; k > j; j++)if (e = a[j], "M" == e[0])f = e[1], g = e[2], h.push(f), i.push(g); else {
                var l = D(f, g, e[1], e[2], e[3], e[4], e[5], e[6]);
                h = h.concat(l.min.x, l.max.x), i = i.concat(l.min.y, l.max.y), f = e[5], g = e[6]
            }
            var m = P.apply(0, h), n = P.apply(0, i), o = Q.apply(0, h), p = Q.apply(0, i), q = d(m, n, o - m, p - n);
            return b.bbox = J(q), q
        }

        function w(a, b, c, d, f) {
            if (f)return [["M", +a + +f, b], ["l", c - 2 * f, 0], ["a", f, f, 0, 0, 1, f, f], ["l", 0, d - 2 * f], ["a", f, f, 0, 0, 1, -f, f], ["l", 2 * f - c, 0], ["a", f, f, 0, 0, 1, -f, -f], ["l", 0, 2 * f - d], ["a", f, f, 0, 0, 1, f, -f], ["z"]];
            var g = [["M", a, b], ["l", c, 0], ["l", 0, d], ["l", -c, 0], ["z"]];
            return g.toString = e, g
        }

        function x(a, b, c, d, f) {
            if (null == f && null == d && (d = c), a = +a, b = +b, c = +c, d = +d, null != f)var g = Math.PI / 180, h = a + c * Math.cos(-d * g), i = a + c * Math.cos(-f * g), j = b + c * Math.sin(-d * g), k = b + c * Math.sin(-f * g), l = [["M", h, j], ["A", c, c, 0, +(f - d > 180), 0, i, k]]; else l = [["M", a, b], ["m", 0, -d], ["a", c, d, 0, 1, 1, 0, 2 * d], ["a", c, d, 0, 1, 1, 0, -2 * d], ["z"]];
            return l.toString = e, l
        }

        function y(b) {
            var d = c(b), g = String.prototype.toLowerCase;
            if (d.rel)return f(d.rel);
            a.is(b, "array") && a.is(b && b[0], "array") || (b = a.parsePathString(b));
            var h = [], i = 0, j = 0, k = 0, l = 0, m = 0;
            "M" == b[0][0] && (i = b[0][1], j = b[0][2], k = i, l = j, m++, h.push(["M", i, j]));
            for (var n = m, o = b.length; o > n; n++) {
                var p = h[n] = [], q = b[n];
                if (q[0] != g.call(q[0]))switch (p[0] = g.call(q[0]), p[0]) {
                    case"a":
                        p[1] = q[1], p[2] = q[2], p[3] = q[3], p[4] = q[4], p[5] = q[5], p[6] = +(q[6] - i).toFixed(3), p[7] = +(q[7] - j).toFixed(3);
                        break;
                    case"v":
                        p[1] = +(q[1] - j).toFixed(3);
                        break;
                    case"m":
                        k = q[1], l = q[2];
                    default:
                        for (var r = 1, s = q.length; s > r; r++)p[r] = +(q[r] - (r % 2 ? i : j)).toFixed(3)
                } else {
                    p = h[n] = [], "m" == q[0] && (k = q[1] + i, l = q[2] + j);
                    for (var t = 0, u = q.length; u > t; t++)h[n][t] = q[t]
                }
                var v = h[n].length;
                switch (h[n][0]) {
                    case"z":
                        i = k, j = l;
                        break;
                    case"h":
                        i += +h[n][v - 1];
                        break;
                    case"v":
                        j += +h[n][v - 1];
                        break;
                    default:
                        i += +h[n][v - 2], j += +h[n][v - 1]
                }
            }
            return h.toString = e, d.rel = f(h), h
        }

        function z(b) {
            var d = c(b);
            if (d.abs)return f(d.abs);
            if (I(b, "array") && I(b && b[0], "array") || (b = a.parsePathString(b)), !b || !b.length)return [["M", 0, 0]];
            var g, h = [], i = 0, j = 0, k = 0, l = 0, m = 0;
            "M" == b[0][0] && (i = +b[0][1], j = +b[0][2], k = i, l = j, m++, h[0] = ["M", i, j]);
            for (var n, o, p = 3 == b.length && "M" == b[0][0] && "R" == b[1][0].toUpperCase() && "Z" == b[2][0].toUpperCase(), q = m, r = b.length; r > q; q++) {
                if (h.push(n = []), o = b[q], g = o[0], g != g.toUpperCase())switch (n[0] = g.toUpperCase(), n[0]) {
                    case"A":
                        n[1] = o[1], n[2] = o[2], n[3] = o[3], n[4] = o[4], n[5] = o[5], n[6] = +o[6] + i, n[7] = +o[7] + j;
                        break;
                    case"V":
                        n[1] = +o[1] + j;
                        break;
                    case"H":
                        n[1] = +o[1] + i;
                        break;
                    case"R":
                        for (var s = [i, j].concat(o.slice(1)), t = 2, u = s.length; u > t; t++)s[t] = +s[t] + i, s[++t] = +s[t] + j;
                        h.pop(), h = h.concat(G(s, p));
                        break;
                    case"O":
                        h.pop(), s = x(i, j, o[1], o[2]), s.push(s[0]), h = h.concat(s);
                        break;
                    case"U":
                        h.pop(), h = h.concat(x(i, j, o[1], o[2], o[3])), n = ["U"].concat(h[h.length - 1].slice(-2));
                        break;
                    case"M":
                        k = +o[1] + i, l = +o[2] + j;
                    default:
                        for (t = 1, u = o.length; u > t; t++)n[t] = +o[t] + (t % 2 ? i : j)
                } else if ("R" == g)s = [i, j].concat(o.slice(1)), h.pop(), h = h.concat(G(s, p)), n = ["R"].concat(o.slice(-2)); else if ("O" == g)h.pop(), s = x(i, j, o[1], o[2]), s.push(s[0]), h = h.concat(s); else if ("U" == g)h.pop(), h = h.concat(x(i, j, o[1], o[2], o[3])), n = ["U"].concat(h[h.length - 1].slice(-2)); else for (var v = 0, w = o.length; w > v; v++)n[v] = o[v];
                if (g = g.toUpperCase(), "O" != g)switch (n[0]) {
                    case"Z":
                        i = +k, j = +l;
                        break;
                    case"H":
                        i = n[1];
                        break;
                    case"V":
                        j = n[1];
                        break;
                    case"M":
                        k = n[n.length - 2], l = n[n.length - 1];
                    default:
                        i = n[n.length - 2], j = n[n.length - 1]
                }
            }
            return h.toString = e, d.abs = f(h), h
        }

        function A(a, b, c, d) {
            return [a, b, c, d, c, d]
        }

        function B(a, b, c, d, e, f) {
            var g = 1 / 3, h = 2 / 3;
            return [g * a + h * c, g * b + h * d, g * e + h * c, g * f + h * d, e, f]
        }

        function C(b, c, d, e, f, g, h, i, j, k) {
            var l, m = 120 * O / 180, n = O / 180 * (+f || 0), o = [], p = a._.cacher(function (a, b, c) {
                var d = a * N.cos(c) - b * N.sin(c), e = a * N.sin(c) + b * N.cos(c);
                return {x: d, y: e}
            });
            if (k)y = k[0], z = k[1], w = k[2], x = k[3]; else {
                l = p(b, c, -n), b = l.x, c = l.y, l = p(i, j, -n), i = l.x, j = l.y;
                var q = (N.cos(O / 180 * f), N.sin(O / 180 * f), (b - i) / 2), r = (c - j) / 2, s = q * q / (d * d) + r * r / (e * e);
                s > 1 && (s = N.sqrt(s), d = s * d, e = s * e);
                var t = d * d, u = e * e, v = (g == h ? -1 : 1) * N.sqrt(S((t * u - t * r * r - u * q * q) / (t * r * r + u * q * q))), w = v * d * r / e + (b + i) / 2, x = v * -e * q / d + (c + j) / 2, y = N.asin(((c - x) / e).toFixed(9)), z = N.asin(((j - x) / e).toFixed(9));
                y = w > b ? O - y : y, z = w > i ? O - z : z, 0 > y && (y = 2 * O + y), 0 > z && (z = 2 * O + z), h && y > z && (y -= 2 * O), !h && z > y && (z -= 2 * O)
            }
            var A = z - y;
            if (S(A) > m) {
                var B = z, D = i, E = j;
                z = y + m * (h && z > y ? 1 : -1), i = w + d * N.cos(z), j = x + e * N.sin(z), o = C(i, j, d, e, f, 0, h, D, E, [z, B, w, x])
            }
            A = z - y;
            var F = N.cos(y), G = N.sin(y), H = N.cos(z), I = N.sin(z), J = N.tan(A / 4), K = 4 / 3 * d * J, L = 4 / 3 * e * J, M = [b, c], P = [b + K * G, c - L * F], Q = [i + K * I, j - L * H], R = [i, j];
            if (P[0] = 2 * M[0] - P[0], P[1] = 2 * M[1] - P[1], k)return [P, Q, R].concat(o);
            o = [P, Q, R].concat(o).join().split(",");
            for (var T = [], U = 0, V = o.length; V > U; U++)T[U] = U % 2 ? p(o[U - 1], o[U], n).y : p(o[U], o[U + 1], n).x;
            return T
        }

        function D(a, b, c, d, e, f, g, h) {
            for (var i, j, k, l, m, n, o, p, q = [], r = [[], []], s = 0; 2 > s; ++s)if (0 == s ? (j = 6 * a - 12 * c + 6 * e, i = -3 * a + 9 * c - 9 * e + 3 * g, k = 3 * c - 3 * a) : (j = 6 * b - 12 * d + 6 * f, i = -3 * b + 9 * d - 9 * f + 3 * h, k = 3 * d - 3 * b), S(i) < 1e-12) {
                if (S(j) < 1e-12)continue;
                l = -k / j, l > 0 && 1 > l && q.push(l)
            } else o = j * j - 4 * k * i, p = N.sqrt(o), 0 > o || (m = (-j + p) / (2 * i), m > 0 && 1 > m && q.push(m), n = (-j - p) / (2 * i), n > 0 && 1 > n && q.push(n));
            for (var t, u = q.length, v = u; u--;)l = q[u], t = 1 - l, r[0][u] = t * t * t * a + 3 * t * t * l * c + 3 * t * l * l * e + l * l * l * g, r[1][u] = t * t * t * b + 3 * t * t * l * d + 3 * t * l * l * f + l * l * l * h;
            return r[0][v] = a, r[1][v] = b, r[0][v + 1] = g, r[1][v + 1] = h, r[0].length = r[1].length = v + 2, {
                min: {
                    x: P.apply(0, r[0]),
                    y: P.apply(0, r[1])
                }, max: {x: Q.apply(0, r[0]), y: Q.apply(0, r[1])}
            }
        }

        function E(a, b) {
            var d = !b && c(a);
            if (!b && d.curve)return f(d.curve);
            for (var e = z(a), g = b && z(b), h = {x: 0, y: 0, bx: 0, by: 0, X: 0, Y: 0, qx: null, qy: null}, i = {
                x: 0,
                y: 0,
                bx: 0,
                by: 0,
                X: 0,
                Y: 0,
                qx: null,
                qy: null
            }, j = (function (a, b, c) {
                var d, e;
                if (!a)return ["C", b.x, b.y, b.x, b.y, b.x, b.y];
                switch (!(a[0] in {T: 1, Q: 1}) && (b.qx = b.qy = null), a[0]) {
                    case"M":
                        b.X = a[1], b.Y = a[2];
                        break;
                    case"A":
                        a = ["C"].concat(C.apply(0, [b.x, b.y].concat(a.slice(1))));
                        break;
                    case"S":
                        "C" == c || "S" == c ? (d = 2 * b.x - b.bx, e = 2 * b.y - b.by) : (d = b.x, e = b.y), a = ["C", d, e].concat(a.slice(1));
                        break;
                    case"T":
                        "Q" == c || "T" == c ? (b.qx = 2 * b.x - b.qx, b.qy = 2 * b.y - b.qy) : (b.qx = b.x, b.qy = b.y), a = ["C"].concat(B(b.x, b.y, b.qx, b.qy, a[1], a[2]));
                        break;
                    case"Q":
                        b.qx = a[1], b.qy = a[2], a = ["C"].concat(B(b.x, b.y, a[1], a[2], a[3], a[4]));
                        break;
                    case"L":
                        a = ["C"].concat(A(b.x, b.y, a[1], a[2]));
                        break;
                    case"H":
                        a = ["C"].concat(A(b.x, b.y, a[1], b.y));
                        break;
                    case"V":
                        a = ["C"].concat(A(b.x, b.y, b.x, a[1]));
                        break;
                    case"Z":
                        a = ["C"].concat(A(b.x, b.y, b.X, b.Y))
                }
                return a
            }), k = function (a, b) {
                if (a[b].length > 7) {
                    a[b].shift();
                    for (var c = a[b]; c.length;)m[b] = "A", g && (n[b] = "A"), a.splice(b++, 0, ["C"].concat(c.splice(0, 6)));
                    a.splice(b, 1), r = Q(e.length, g && g.length || 0)
                }
            }, l = function (a, b, c, d, f) {
                a && b && "M" == a[f][0] && "M" != b[f][0] && (b.splice(f, 0, ["M", d.x, d.y]), c.bx = 0, c.by = 0, c.x = a[f][1], c.y = a[f][2], r = Q(e.length, g && g.length || 0))
            }, m = [], n = [], o = "", p = "", q = 0, r = Q(e.length, g && g.length || 0); r > q; q++) {
                e[q] && (o = e[q][0]), "C" != o && (m[q] = o, q && (p = m[q - 1])), e[q] = j(e[q], h, p), "A" != m[q] && "C" == o && (m[q] = "C"), k(e, q), g && (g[q] && (o = g[q][0]), "C" != o && (n[q] = o, q && (p = n[q - 1])), g[q] = j(g[q], i, p), "A" != n[q] && "C" == o && (n[q] = "C"), k(g, q)), l(e, g, h, i, q), l(g, e, i, h, q);
                var s = e[q], t = g && g[q], u = s.length, v = g && t.length;
                h.x = s[u - 2], h.y = s[u - 1], h.bx = M(s[u - 4]) || h.x, h.by = M(s[u - 3]) || h.y, i.bx = g && (M(t[v - 4]) || i.x), i.by = g && (M(t[v - 3]) || i.y), i.x = g && t[v - 2], i.y = g && t[v - 1]
            }
            return g || (d.curve = f(e)), g ? [e, g] : e
        }

        function F(a, b) {
            if (!b)return a;
            var c, d, e, f, g, h, i;
            for (a = E(a), e = 0, g = a.length; g > e; e++)for (i = a[e], f = 1, h = i.length; h > f; f += 2)c = b.x(i[f], i[f + 1]), d = b.y(i[f], i[f + 1]), i[f] = c, i[f + 1] = d;
            return a
        }

        function G(a, b) {
            for (var c = [], d = 0, e = a.length; e - 2 * !b > d; d += 2) {
                var f = [{x: +a[d - 2], y: +a[d - 1]}, {x: +a[d], y: +a[d + 1]}, {
                    x: +a[d + 2],
                    y: +a[d + 3]
                }, {x: +a[d + 4], y: +a[d + 5]}];
                b ? d ? e - 4 == d ? f[3] = {x: +a[0], y: +a[1]} : e - 2 == d && (f[2] = {
                    x: +a[0],
                    y: +a[1]
                }, f[3] = {x: +a[2], y: +a[3]}) : f[0] = {
                    x: +a[e - 2],
                    y: +a[e - 1]
                } : e - 4 == d ? f[3] = f[2] : d || (f[0] = {
                    x: +a[d],
                    y: +a[d + 1]
                }), c.push(["C", (-f[0].x + 6 * f[1].x + f[2].x) / 6, (-f[0].y + 6 * f[1].y + f[2].y) / 6, (f[1].x + 6 * f[2].x - f[3].x) / 6, (f[1].y + 6 * f[2].y - f[3].y) / 6, f[2].x, f[2].y])
            }
            return c
        }

        var H = b.prototype, I = a.is, J = a._.clone, K = "hasOwnProperty", L = /,?([a-z]),?/gi, M = parseFloat, N = Math, O = N.PI, P = N.min, Q = N.max, R = N.pow, S = N.abs, T = h(1), U = h(), V = h(0, 1), W = a._unit2px, X = {
            path: function (a) {
                return a.attr("path")
            }, circle: function (a) {
                var b = W(a);
                return x(b.cx, b.cy, b.r)
            }, ellipse: function (a) {
                var b = W(a);
                return x(b.cx || 0, b.cy || 0, b.rx, b.ry)
            }, rect: function (a) {
                var b = W(a);
                return w(b.x || 0, b.y || 0, b.width, b.height, b.rx, b.ry)
            }, image: function (a) {
                var b = W(a);
                return w(b.x || 0, b.y || 0, b.width, b.height)
            }, line: function (a) {
                return "M" + [a.attr("x1") || 0, a.attr("y1") || 0, a.attr("x2"), a.attr("y2")]
            }, polyline: function (a) {
                return "M" + a.attr("points")
            }, polygon: function (a) {
                return "M" + a.attr("points") + "z"
            }, deflt: function (a) {
                var b = a.node.getBBox();
                return w(b.x, b.y, b.width, b.height)
            }
        };
        a.path = c, a.path.getTotalLength = T, a.path.getPointAtLength = U, a.path.getSubpath = function (a, b, c) {
            if (this.getTotalLength(a) - c < 1e-6)return V(a, b).end;
            var d = V(a, c, 1);
            return b ? V(d, b).end : d
        }, H.getTotalLength = function () {
            return this.node.getTotalLength ? this.node.getTotalLength() : void 0
        }, H.getPointAtLength = function (a) {
            return U(this.attr("d"), a)
        }, H.getSubpath = function (b, c) {
            return a.path.getSubpath(this.attr("d"), b, c)
        }, a._.box = d, a.path.findDotsAtSegment = i, a.path.bezierBBox = j, a.path.isPointInsideBBox = k, a.path.isBBoxIntersect = l, a.path.intersection = r, a.path.intersectionNumber = s, a.path.isPointInside = u, a.path.getBBox = v, a.path.get = X, a.path.toRelative = y, a.path.toAbsolute = z, a.path.toCubic = E, a.path.map = F, a.path.toString = e, a.path.clone = f
    }), d.plugin(function (a) {
        var d = Math.max, e = Math.min, f = function (a) {
            if (this.items = [], this.bindings = {}, this.length = 0, this.type = "set", a)for (var b = 0, c = a.length; c > b; b++)a[b] && (this[this.items.length] = this.items[this.items.length] = a[b], this.length++)
        }, g = f.prototype;
        g.push = function () {
            for (var a, b, c = 0, d = arguments.length; d > c; c++)a = arguments[c], a && (b = this.items.length, this[b] = this.items[b] = a, this.length++);
            return this
        }, g.pop = function () {
            return this.length && delete this[this.length--], this.items.pop()
        }, g.forEach = function (a, b) {
            for (var c = 0, d = this.items.length; d > c; c++)if (a.call(b, this.items[c], c) === !1)return this;
            return this
        }, g.animate = function (d, e, f, g) {
            "function" != typeof f || f.length || (g = f, f = c.linear), d instanceof a._.Animation && (g = d.callback, f = d.easing, e = f.dur, d = d.attr);
            var h = arguments;
            if (a.is(d, "array") && a.is(h[h.length - 1], "array"))var i = !0;
            var j, k = function () {
                j ? this.b = j : j = this.b
            }, l = 0, m = g && function () {
                    l++ == this.length && g.call(this)
                };
            return this.forEach(function (a, c) {
                b.once("snap.animcreated." + a.id, k), i ? h[c] && a.animate.apply(a, h[c]) : a.animate(d, e, f, m)
            })
        }, g.remove = function () {
            for (; this.length;)this.pop().remove();
            return this
        }, g.bind = function (a, b, c) {
            var d = {};
            if ("function" == typeof b)this.bindings[a] = b; else {
                var e = c || a;
                this.bindings[a] = function (a) {
                    d[e] = a, b.attr(d)
                }
            }
            return this
        }, g.attr = function (a) {
            var b = {};
            for (var c in a)this.bindings[c] ? this.bindings[c](a[c]) : b[c] = a[c];
            for (var d = 0, e = this.items.length; e > d; d++)this.items[d].attr(b);
            return this
        }, g.clear = function () {
            for (; this.length;)this.pop()
        }, g.splice = function (a, b) {
            a = 0 > a ? d(this.length + a, 0) : a, b = d(0, e(this.length - a, b));
            var c, g = [], h = [], i = [];
            for (c = 2; c < arguments.length; c++)i.push(arguments[c]);
            for (c = 0; b > c; c++)h.push(this[a + c]);
            for (; c < this.length - a; c++)g.push(this[a + c]);
            var j = i.length;
            for (c = 0; c < j + g.length; c++)this.items[a + c] = this[a + c] = j > c ? i[c] : g[c - j];
            for (c = this.items.length = this.length -= b - j; this[c];)delete this[c++];
            return new f(h)
        }, g.exclude = function (a) {
            for (var b = 0, c = this.length; c > b; b++)if (this[b] == a)return this.splice(b, 1), !0;
            return !1
        }, g.insertAfter = function (a) {
            for (var b = this.items.length; b--;)this.items[b].insertAfter(a);
            return this
        }, g.getBBox = function () {
            for (var a = [], b = [], c = [], f = [], g = this.items.length; g--;)if (!this.items[g].removed) {
                var h = this.items[g].getBBox();
                a.push(h.x), b.push(h.y), c.push(h.x + h.width), f.push(h.y + h.height)
            }
            return a = e.apply(0, a), b = e.apply(0, b), c = d.apply(0, c), f = d.apply(0, f), {
                x: a,
                y: b,
                x2: c,
                y2: f,
                width: c - a,
                height: f - b,
                cx: a + (c - a) / 2,
                cy: b + (f - b) / 2
            }
        }, g.clone = function (a) {
            a = new f;
            for (var b = 0, c = this.items.length; c > b; b++)a.push(this.items[b].clone());
            return a
        }, g.toString = function () {
            return "Snap‘s set"
        }, g.type = "set", a.set = function () {
            var a = new f;
            return arguments.length && a.push.apply(a, Array.prototype.slice.call(arguments, 0)), a
        }
    }), d.plugin(function (a, c) {
        function d(a) {
            var b = a[0];
            switch (b.toLowerCase()) {
                case"t":
                    return [b, 0, 0];
                case"m":
                    return [b, 1, 0, 0, 1, 0, 0];
                case"r":
                    return 4 == a.length ? [b, 0, a[2], a[3]] : [b, 0];
                case"s":
                    return 5 == a.length ? [b, 1, 1, a[3], a[4]] : 3 == a.length ? [b, 1, 1] : [b, 1]
            }
        }

        function e(b, c, e) {
            c = m(c).replace(/\.{3}|\u2026/g, b), b = a.parseTransformString(b) || [], c = a.parseTransformString(c) || [];
            for (var f, g, h, k, l = Math.max(b.length, c.length), n = [], o = [], p = 0; l > p; p++) {
                if (h = b[p] || d(c[p]), k = c[p] || d(h), h[0] != k[0] || "r" == h[0].toLowerCase() && (h[2] != k[2] || h[3] != k[3]) || "s" == h[0].toLowerCase() && (h[3] != k[3] || h[4] != k[4])) {
                    b = a._.transform2matrix(b, e()), c = a._.transform2matrix(c, e()), n = [["m", b.a, b.b, b.c, b.d, b.e, b.f]], o = [["m", c.a, c.b, c.c, c.d, c.e, c.f]];
                    break
                }
                for (n[p] = [], o[p] = [], f = 0, g = Math.max(h.length, k.length); g > f; f++)f in h && (n[p][f] = h[f]), f in k && (o[p][f] = k[f])
            }
            return {from: j(n), to: j(o), f: i(n)}
        }

        function f(a) {
            return a
        }

        function g(a) {
            return function (b) {
                return +b.toFixed(3) + a
            }
        }

        function h(b) {
            return a.rgb(b[0], b[1], b[2])
        }

        function i(a) {
            var b, c, d, e, f, g, h = 0, i = [];
            for (b = 0, c = a.length; c > b; b++) {
                for (f = "[", g = ['"' + a[b][0] + '"'], d = 1, e = a[b].length; e > d; d++)g[d] = "val[" + h++ + "]";
                f += g + "]", i[b] = f
            }
            return Function("val", "return Snap.path.toString.call([" + i + "])")
        }

        function j(a) {
            for (var b = [], c = 0, d = a.length; d > c; c++)for (var e = 1, f = a[c].length; f > e; e++)b.push(a[c][e]);
            return b
        }

        var k = {}, l = /[a-z]+$/i, m = String;
        k.stroke = k.fill = "colour", c.prototype.equal = function (a, c) {
            return b("snap.util.equal", this, a, c).firstDefined()
        }, b.on("snap.util.equal", function (b, c) {
            var d, n, o = m(this.attr(b) || ""), p = this;
            if (o == +o && c == +c)return {from: +o, to: +c, f: f};
            if ("colour" == k[b])return d = a.color(o), n = a.color(c), {
                from: [d.r, d.g, d.b, d.opacity],
                to: [n.r, n.g, n.b, n.opacity],
                f: h
            };
            if ("transform" == b || "gradientTransform" == b || "patternTransform" == b)return c instanceof a.Matrix && (c = c.toTransformString()), a._.rgTransform.test(c) || (c = a._.svgTransform2string(c)), e(o, c, function () {
                return p.getBBox(1)
            });
            if ("d" == b || "path" == b)return d = a.path.toCubic(o, c), {from: j(d[0]), to: j(d[1]), f: i(d[0])};
            if ("points" == b)return d = m(o).split(a._.separator), n = m(c).split(a._.separator), {
                from: d,
                to: n,
                f: function (a) {
                    return a
                }
            };
            aUnit = o.match(l);
            var q = m(c).match(l);
            return aUnit && aUnit == q ? {from: parseFloat(o), to: parseFloat(c), f: g(aUnit)} : {
                from: this.asPX(b),
                to: this.asPX(b, c),
                f: f
            }
        })
    }), d.plugin(function (a, c, d, e) {
        for (var f = c.prototype, g = "hasOwnProperty", h = ("createTouch" in e.doc), i = ["click", "dblclick", "mousedown", "mousemove", "mouseout", "mouseover", "mouseup", "touchstart", "touchmove", "touchend", "touchcancel"], j = {
            mousedown: "touchstart",
            mousemove: "touchmove",
            mouseup: "touchend"
        }, k = (function (a, b) {
            var c = "y" == a ? "scrollTop" : "scrollLeft", d = b && b.node ? b.node.ownerDocument : e.doc;
            return d[c in d.documentElement ? "documentElement" : "body"][c]
        }), l = function () {
            this.returnValue = !1
        }, m = function () {
            return this.originalEvent.preventDefault()
        }, n = function () {
            this.cancelBubble = !0
        }, o = function () {
            return this.originalEvent.stopPropagation()
        }, p = function () {
            return e.doc.addEventListener ? function (a, b, c, d) {
                var e = h && j[b] ? j[b] : b, f = function (e) {
                    var f = k("y", d), i = k("x", d);
                    if (h && j[g](b))for (var l = 0, n = e.targetTouches && e.targetTouches.length; n > l; l++)if (e.targetTouches[l].target == a || a.contains(e.targetTouches[l].target)) {
                        var p = e;
                        e = e.targetTouches[l], e.originalEvent = p, e.preventDefault = m, e.stopPropagation = o;
                        break
                    }
                    var q = e.clientX + i, r = e.clientY + f;
                    return c.call(d, e, q, r)
                };
                return b !== e && a.addEventListener(b, f, !1), a.addEventListener(e, f, !1), function () {
                    return b !== e && a.removeEventListener(b, f, !1), a.removeEventListener(e, f, !1), !0
                }
            } : e.doc.attachEvent ? function (a, b, c, d) {
                var e = function (a) {
                    a = a || d.node.ownerDocument.window.event;
                    var b = k("y", d), e = k("x", d), f = a.clientX + e, g = a.clientY + b;
                    return a.preventDefault = a.preventDefault || l, a.stopPropagation = a.stopPropagation || n, c.call(d, a, f, g)
                };
                a.attachEvent("on" + b, e);
                var f = function () {
                    return a.detachEvent("on" + b, e), !0
                };
                return f
            } : void 0
        }(), q = [], r = function (a) {
            for (var c, d = a.clientX, e = a.clientY, f = k("y"), g = k("x"), i = q.length; i--;) {
                if (c = q[i], h) {
                    for (var j, l = a.touches && a.touches.length; l--;)if (j = a.touches[l], j.identifier == c.el._drag.id || c.el.node.contains(j.target)) {
                        d = j.clientX, e = j.clientY, (a.originalEvent ? a.originalEvent : a).preventDefault();
                        break
                    }
                } else a.preventDefault();
                {
                    var m = c.el.node;
                    m.nextSibling, m.parentNode, m.style.display
                }
                d += g, e += f, b("snap.drag.move." + c.el.id, c.move_scope || c.el, d - c.el._drag.x, e - c.el._drag.y, d, e, a)
            }
        }, s = function (c) {
            a.unmousemove(r).unmouseup(s);
            for (var d, e = q.length; e--;)d = q[e], d.el._drag = {}, b("snap.drag.end." + d.el.id, d.end_scope || d.start_scope || d.move_scope || d.el, c);
            q = []
        }, t = i.length; t--;)!function (b) {
            a[b] = f[b] = function (c, d) {
                return a.is(c, "function") && (this.events = this.events || [], this.events.push({
                    name: b,
                    f: c,
                    unbind: p(this.node || document, b, c, d || this)
                })), this
            }, a["un" + b] = f["un" + b] = function (a) {
                for (var c = this.events || [], d = c.length; d--;)if (c[d].name == b && (c[d].f == a || !a))return c[d].unbind(), c.splice(d, 1), !c.length && delete this.events, this;
                return this
            }
        }(i[t]);
        f.hover = function (a, b, c, d) {
            return this.mouseover(a, c).mouseout(b, d || c)
        }, f.unhover = function (a, b) {
            return this.unmouseover(a).unmouseout(b)
        };
        var u = [];
        f.drag = function (c, d, e, f, g, h) {
            function i(i, j, k) {
                (i.originalEvent || i).preventDefault(), this._drag.x = j, this._drag.y = k, this._drag.id = i.identifier, !q.length && a.mousemove(r).mouseup(s), q.push({
                    el: this,
                    move_scope: f,
                    start_scope: g,
                    end_scope: h
                }), d && b.on("snap.drag.start." + this.id, d), c && b.on("snap.drag.move." + this.id, c), e && b.on("snap.drag.end." + this.id, e), b("snap.drag.start." + this.id, g || f || this, j, k, i)
            }

            if (!arguments.length) {
                var j;
                return this.drag(function (a, b) {
                    this.attr({transform: j + (j ? "T" : "t") + [a, b]})
                }, function () {
                    j = this.transform().local
                })
            }
            return this._drag = {}, u.push({el: this, start: i}), this.mousedown(i), this
        }, f.undrag = function () {
            for (var c = u.length; c--;)u[c].el == this && (this.unmousedown(u[c].start), u.splice(c, 1), b.unbind("snap.drag.*." + this.id));
            return !u.length && a.unmousemove(r).unmouseup(s), this
        }
    }), d.plugin(function (a, c, d) {
        var e = (c.prototype, d.prototype), f = /^\s*url\((.+)\)/, g = String, h = a._.$;
        a.filter = {}, e.filter = function (b) {
            var d = this;
            "svg" != d.type && (d = d.paper);
            var e = a.parse(g(b)), f = a._.id(), i = (d.node.offsetWidth, d.node.offsetHeight, h("filter"));
            return h(i, {id: f, filterUnits: "userSpaceOnUse"}), i.appendChild(e.node), d.defs.appendChild(i), new c(i)
        }, b.on("snap.util.getattr.filter", function () {
            b.stop();
            var c = h(this.node, "filter");
            if (c) {
                var d = g(c).match(f);
                return d && a.select(d[1])
            }
        }), b.on("snap.util.attr.filter", function (d) {
            if (d instanceof c && "filter" == d.type) {
                b.stop();
                var e = d.node.id;
                e || (h(d.node, {id: d.id}), e = d.id), h(this.node, {filter: a.url(e)})
            }
            d && "none" != d || (b.stop(), this.node.removeAttribute("filter"))
        }), a.filter.blur = function (b, c) {
            null == b && (b = 2);
            var d = null == c ? b : [b, c];
            return a.format('<feGaussianBlur stdDeviation="{def}"/>', {def: d})
        }, a.filter.blur.toString = function () {
            return this()
        }, a.filter.shadow = function (b, c, d, e, f) {
            return "string" == typeof d && (e = d, f = e, d = 4), "string" != typeof e && (f = e, e = "#000"), e = e || "#000", null == d && (d = 4), null == f && (f = 1), null == b && (b = 0, c = 2), null == c && (c = b), e = a.color(e), a.format('<feGaussianBlur in="SourceAlpha" stdDeviation="{blur}"/><feOffset dx="{dx}" dy="{dy}" result="offsetblur"/><feFlood flood-color="{color}"/><feComposite in2="offsetblur" operator="in"/><feComponentTransfer><feFuncA type="linear" slope="{opacity}"/></feComponentTransfer><feMerge><feMergeNode/><feMergeNode in="SourceGraphic"/></feMerge>', {
                color: e,
                dx: b,
                dy: c,
                blur: d,
                opacity: f
            })
        }, a.filter.shadow.toString = function () {
            return this()
        }, a.filter.grayscale = function (b) {
            return null == b && (b = 1), a.format('<feColorMatrix type="matrix" values="{a} {b} {c} 0 0 {d} {e} {f} 0 0 {g} {b} {h} 0 0 0 0 0 1 0"/>', {
                a: .2126 + .7874 * (1 - b),
                b: .7152 - .7152 * (1 - b),
                c: .0722 - .0722 * (1 - b),
                d: .2126 - .2126 * (1 - b),
                e: .7152 + .2848 * (1 - b),
                f: .0722 - .0722 * (1 - b),
                g: .2126 - .2126 * (1 - b),
                h: .0722 + .9278 * (1 - b)
            })
        }, a.filter.grayscale.toString = function () {
            return this()
        }, a.filter.sepia = function (b) {
            return null == b && (b = 1), a.format('<feColorMatrix type="matrix" values="{a} {b} {c} 0 0 {d} {e} {f} 0 0 {g} {h} {i} 0 0 0 0 0 1 0"/>', {
                a: .393 + .607 * (1 - b),
                b: .769 - .769 * (1 - b),
                c: .189 - .189 * (1 - b),
                d: .349 - .349 * (1 - b),
                e: .686 + .314 * (1 - b),
                f: .168 - .168 * (1 - b),
                g: .272 - .272 * (1 - b),
                h: .534 - .534 * (1 - b),
                i: .131 + .869 * (1 - b)
            })
        }, a.filter.sepia.toString = function () {
            return this()
        }, a.filter.saturate = function (b) {
            return null == b && (b = 1), a.format('<feColorMatrix type="saturate" values="{amount}"/>', {amount: 1 - b})
        }, a.filter.saturate.toString = function () {
            return this()
        }, a.filter.hueRotate = function (b) {
            return b = b || 0, a.format('<feColorMatrix type="hueRotate" values="{angle}"/>', {angle: b})
        }, a.filter.hueRotate.toString = function () {
            return this()
        }, a.filter.invert = function (b) {
            return null == b && (b = 1), a.format('<feComponentTransfer><feFuncR type="table" tableValues="{amount} {amount2}"/><feFuncG type="table" tableValues="{amount} {amount2}"/><feFuncB type="table" tableValues="{amount} {amount2}"/></feComponentTransfer>', {
                amount: b,
                amount2: 1 - b
            })
        }, a.filter.invert.toString = function () {
            return this()
        }, a.filter.brightness = function (b) {
            return null == b && (b = 1), a.format('<feComponentTransfer><feFuncR type="linear" slope="{amount}"/><feFuncG type="linear" slope="{amount}"/><feFuncB type="linear" slope="{amount}"/></feComponentTransfer>', {amount: b})
        }, a.filter.brightness.toString = function () {
            return this()
        }, a.filter.contrast = function (b) {
            return null == b && (b = 1), a.format('<feComponentTransfer><feFuncR type="linear" slope="{amount}" intercept="{amount2}"/><feFuncG type="linear" slope="{amount}" intercept="{amount2}"/><feFuncB type="linear" slope="{amount}" intercept="{amount2}"/></feComponentTransfer>', {
                amount: b,
                amount2: .5 - b / 2
            })
        }, a.filter.contrast.toString = function () {
            return this()
        }
    }), d
});