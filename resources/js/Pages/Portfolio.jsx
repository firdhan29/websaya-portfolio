import React from 'react';
import { Head } from '@inertiajs/react';
import { motion, AnimatePresence } from 'framer-motion';
import { User, Code2, Briefcase, Mail, ArrowRight, Server, Layout, Database, Smartphone, Terminal, X, ChevronLeft, ChevronRight, ExternalLink } from 'lucide-react';
import { FaGithub, FaLinkedin } from "react-icons/fa";
import * as SiIcons from "react-icons/si";

// -----------------------------------------------------
// SKILLS LOGIC (From vandaru.my.id)
// -----------------------------------------------------

const categoryIconMap = {
  backend: Server,
  frontend: Layout,
  "backend/data": Terminal,
  database: Database,
  fullstack: Code2,
  mobile: Smartphone,
};

const getDynamicIcon = (name) => {
  if (!name) return null;
  const normalized = name.toLowerCase().replace(/[^a-z0-9]/g, '');
  if (normalized.includes('veu') || normalized.includes('vue')) return SiIcons.SiVuedotjs;
  if (normalized.includes('react')) return SiIcons.SiReact;
  if (normalized.includes('laravel')) return SiIcons.SiLaravel;
  if (normalized.includes('tailwind')) return SiIcons.SiTailwindcss;
  if (normalized.includes('postgres')) return SiIcons.SiPostgresql;
  if (normalized.includes('node')) return SiIcons.SiNodedotjs;
  if (normalized.includes('js') || normalized.includes('javascript')) return SiIcons.SiJavascript;
  if (normalized.includes('php')) return SiIcons.SiPhp;
  if (normalized.includes('mysql')) return SiIcons.SiMysql;
  
  const searchName = normalized.startsWith('si') ? normalized : `si${normalized}`;
  const exactMatch = Object.keys(SiIcons).find((key) => key.toLowerCase() === searchName);
  if (exactMatch) return SiIcons[exactMatch];
  
  const partialMatch = Object.keys(SiIcons).find((key) => key.toLowerCase().startsWith(searchName));
  if (partialMatch) return SiIcons[partialMatch];
  return null;
};

const getDynamicColor = (name) => {
  if (!name) return "text-zinc-100 bg-zinc-100/10";
  const normalized = name.toLowerCase();
  if (normalized.includes('vue') || normalized.includes('veu') || normalized.includes('node') || normalized.includes('mongo')) return "text-emerald-500 bg-emerald-500/10";
  if (normalized.includes('react') || normalized.includes('mysql') || normalized.includes('postgres') || normalized.includes('tailwind') || normalized.includes('php') || normalized.includes('css')) return "text-blue-500 bg-blue-500/10";
  if (normalized.includes('laravel') || normalized.includes('html') || normalized.includes('angular')) return "text-red-500 bg-red-500/10";
  if (normalized.includes('python') || normalized.includes('js') || normalized.includes('javascript')) return "text-yellow-500 bg-yellow-500/10";
  return "text-zinc-100 bg-zinc-100/10";
};

// -----------------------------------------------------
// COMPONENTS
// -----------------------------------------------------

const AutoSlider = ({ images, onClick, isZoomed = false, index = 0 }) => {
    const [currentIndex, setCurrentIndex] = React.useState(0);
    const [isHovered, setIsHovered] = React.useState(false);

    React.useEffect(() => {
        if (!images || images.length <= 1 || isHovered) return;
        const interval = setInterval(() => {
            setCurrentIndex((prev) => (prev + 1) % images.length);
        }, 5000);
        return () => clearInterval(interval);
    }, [images, isHovered]);

    const nextImage = (e) => {
        e.stopPropagation();
        setCurrentIndex((prev) => (prev + 1) % images.length);
    };

    const prevImage = (e) => {
        e.stopPropagation();
        setCurrentIndex((prev) => (prev - 1 + images.length) % images.length);
    };

    if (!images || images.length === 0) return null;

    return (
        <div 
            onClick={onClick}
            onMouseEnter={() => setIsHovered(true)}
            onMouseLeave={() => setIsHovered(false)}
            className={`relative w-full overflow-hidden bg-zinc-900/50 ${
                isZoomed ? "h-full" : `h-64 sm:h-80 cursor-zoom-in ${index === 2 ? 'md:h-96' : ''}`
            }`}
        >
            <AnimatePresence mode="wait">
                <motion.img
                    key={currentIndex}
                    src={`/storage/${images[currentIndex]}`}
                    alt={`Project screenshot ${currentIndex + 1}`}
                    initial={{ opacity: 0, x: 20 }}
                    animate={{ opacity: 1, x: 0 }}
                    exit={{ opacity: 0, x: -20 }}
                    transition={{ duration: 0.4 }}
                    className={`absolute inset-0 w-full h-full transform transition-transform duration-700 ease-out ${
                        isZoomed ? "object-contain" : "object-cover group-hover:scale-105"
                    }`}
                />
            </AnimatePresence>

            {!isZoomed && (
                <div className="absolute inset-0 bg-black/20 group-hover:bg-transparent transition-colors z-10 pointer-events-none" />
            )}
            
            {images.length > 1 && (
                <>
                    <button 
                        onClick={prevImage}
                        className="absolute left-4 top-1/2 -translate-y-1/2 z-20 p-2 rounded-full bg-black/50 border border-white/10 text-white opacity-0 group-hover:opacity-100 transition-opacity hover:bg-black/80"
                    >
                        <ChevronLeft className="w-5 h-5" />
                    </button>
                    <button 
                        onClick={nextImage}
                        className="absolute right-4 top-1/2 -translate-y-1/2 z-20 p-2 rounded-full bg-black/50 border border-white/10 text-white opacity-0 group-hover:opacity-100 transition-opacity hover:bg-black/80"
                    >
                        <ChevronRight className="w-5 h-5" />
                    </button>

                    <div className="absolute bottom-4 left-1/2 -translate-x-1/2 z-20 flex gap-2">
                        {images.map((_, idx) => (
                            <div
                                key={idx}
                                onClick={(e) => { e.stopPropagation(); setCurrentIndex(idx); }}
                                className={`w-1.5 h-1.5 rounded-full cursor-pointer transition-all duration-300 ${
                                    currentIndex === idx ? "bg-white w-4" : "bg-white/40 hover:bg-white/60"
                                }`}
                            />
                        ))}
                    </div>
                </>
            )}
        </div>
    );
};

export default function Portfolio({ user, projects, experiences, skills }) {
    const [zoomedImage, setZoomedImage] = React.useState(null);

    const navItems = [
        { name: "About", icon: User, href: "#about" },
        { name: "Skills", icon: Code2, href: "#skills" },
        { name: "Journey", icon: Briefcase, href: "#journey" },
        { name: "Work", icon: Code2, href: "#projects" },
    ];

    const displaySkills = skills && skills.length > 0 
        ? skills.map((s) => {
            const categoryKey = (s.category || '').toLowerCase();
            const specificIcon = getDynamicIcon(s.name) || categoryIconMap[categoryKey] || Code2;
            const specificColorClass = getDynamicColor(s.name);
            return {
              ...s,
              icon: specificIcon,
              bg: specificColorClass.split(' ')[1] || "bg-zinc-100/10",
              color: specificColorClass.split(' ')[0] || "text-zinc-100"
            };
          })
        : [];

    return (
        <div className="min-h-screen bg-background text-zinc-100 font-sans selection:bg-brand-dark selection:text-white overflow-hidden relative">
            <Head title={`Portfolio | ${user?.name || 'Developer'}`} />
            
            {/* Navbar (Floating Pill) */}
            <motion.nav
                initial={{ y: -100, opacity: 0 }}
                animate={{ y: 0, opacity: 1 }}
                transition={{ duration: 0.8, type: "spring", bounce: 0.4 }}
                className="fixed top-6 inset-x-0 mx-auto w-max z-50 px-6 py-3 rounded-full border border-white/10 bg-black/40 backdrop-blur-xl flex items-center justify-center gap-6 md:gap-8 shadow-2xl"
            >
                {navItems.map((item, index) => (
                    <a
                    key={index}
                    href={item.href}
                    className="group flex items-center gap-2 text-sm font-medium text-zinc-400 hover:text-white transition-colors"
                    >
                    <item.icon className="w-4 h-4 group-hover:scale-110 transition-transform" />
                    <span className="hidden md:inline">{item.name}</span>
                    </a>
                ))}
            </motion.nav>

            <main>
                {/* Hero Section */}
                <section id="about" className="relative min-h-screen flex items-center justify-center">
                    <motion.div 
                        animate={{ scale: [1, 1.1, 1], rotate: [0, 5, -5, 0] }}
                        transition={{ duration: 15, repeat: Infinity, repeatType: "reverse" }}
                        className="absolute top-1/4 left-1/4 w-[30rem] h-[30rem] bg-brand/10 rounded-full blur-[120px] pointer-events-none" 
                    />
                    <motion.div 
                        animate={{ scale: [1, 1.2, 1], rotate: [0, -10, 10, 0] }}
                        transition={{ duration: 20, repeat: Infinity, repeatType: "reverse" }}
                        className="absolute bottom-1/4 right-1/4 w-[30rem] h-[30rem] bg-purple-500/10 rounded-full blur-[120px] pointer-events-none" 
                    />

                    <div className="z-10 max-w-5xl px-6 w-full flex flex-col items-center text-center mt-20">
                        <motion.div
                        initial={{ opacity: 0, scale: 0.9 }}
                        animate={{ opacity: 1, scale: 1 }}
                        transition={{ duration: 0.8, ease: "easeOut" }}
                        className="inline-flex items-center gap-2 px-3 py-1 rounded-full border border-white/10 bg-white/5 backdrop-blur-sm mb-8"
                        >
                        <span className="w-2 h-2 rounded-full bg-green-500 animate-pulse" />
                        <span className="text-sm font-medium text-zinc-300">
                            Available for new opportunities
                        </span>
                        </motion.div>

                        <motion.h1
                        initial={{ opacity: 0, y: 20 }}
                        animate={{ opacity: 1, y: 0 }}
                        transition={{ duration: 0.8, delay: 0.1, ease: "easeOut" }}
                        className="text-5xl md:text-7xl font-bold tracking-tight mb-6"
                        >
                        <span className="text-zinc-500">Hi, I'm </span>
                        <span className="text-transparent bg-clip-text bg-gradient-to-r from-brand-light to-brand">
                            {user?.name || 'Firdhan Vandaru'}
                        </span>
                        </motion.h1>

                        <motion.p
                        initial={{ opacity: 0, y: 20 }}
                        animate={{ opacity: 1, y: 0 }}
                        transition={{ duration: 0.8, delay: 0.2, ease: "easeOut" }}
                        className="text-lg md:text-xl text-zinc-400 font-light leading-relaxed max-w-3xl mb-4"
                        >
                        {user?.summary || "Full Stack Developer & Software Engineer"}
                        </motion.p>
                        
                        <motion.div
                        initial={{ opacity: 0, y: 20 }}
                        animate={{ opacity: 1, y: 0 }}
                        transition={{ duration: 0.8, delay: 0.4, ease: "easeOut" }}
                        className="flex flex-col sm:flex-row items-center gap-4 mt-12"
                        >
                        <a href="#projects" className="group flex items-center gap-2 bg-white text-black px-6 py-3 rounded-full font-medium hover:bg-zinc-200 transition-colors">
                            View My Work
                            <ArrowRight className="w-4 h-4 group-hover:translate-x-1 transition-transform" />
                        </a>
                        
                        <div className="flex items-center gap-4 ml-0 sm:ml-4">
                            {user?.github_url && (
                                <a href={user.github_url} target="_blank" rel="noopener noreferrer" className="p-3 rounded-full border border-white/10 hover:bg-white/5 transition-colors text-zinc-400 hover:text-white">
                                    <FaGithub className="w-5 h-5" />
                                </a>
                            )}
                            {user?.linkedin_url && (
                                <a href={user.linkedin_url} target="_blank" rel="noopener noreferrer" className="p-3 rounded-full border border-white/10 hover:bg-white/5 transition-colors text-zinc-400 hover:text-white">
                                    <FaLinkedin className="w-5 h-5" />
                                </a>
                            )}
                            {user?.email && (
                                <a href={`mailto:${user.email}`} className="p-3 rounded-full border border-white/10 hover:bg-white/5 transition-colors text-zinc-400 hover:text-white">
                                    <Mail className="w-5 h-5" />
                                </a>
                            )}
                        </div>
                        </motion.div>
                    </div>
                </section>

                {/* Skills Section */}
                {displaySkills.length > 0 && (
                    <section id="skills" className="py-24 px-6 max-w-5xl mx-auto w-full relative z-10">
                        <div className="mb-16 text-center md:text-left">
                            <h2 className="text-3xl md:text-4xl font-bold mb-4">Tech Stack & Expertise</h2>
                            <p className="text-zinc-400 max-w-2xl mx-auto md:mx-0">
                                A blend of powerful frameworks and modern tools to build scalable, high-performance applications.
                            </p>
                        </div>

                        <motion.div
                            initial="hidden"
                            whileInView="visible"
                            viewport={{ once: true, margin: "-100px" }}
                            variants={{
                                hidden: { opacity: 0 },
                                visible: { opacity: 1, transition: { staggerChildren: 0.1 } }
                            }}
                            className="grid grid-cols-2 md:grid-cols-3 gap-4"
                        >
                            {displaySkills.map((skill, index) => {
                                const IconComponent = skill.icon;
                                return (
                                <motion.div
                                    key={index}
                                    variants={{ hidden: { opacity: 0, y: 20 }, visible: { opacity: 1, y: 0, transition: { duration: 0.5 } } }}
                                    whileHover={{ y: -5, scale: 1.02 }}
                                    className="group relative p-6 rounded-2xl border border-white/5 bg-white/[0.02] hover:bg-white/[0.04] transition-all overflow-hidden"
                                >
                                    <div className={`absolute top-0 right-0 w-32 h-32 blur-3xl rounded-full translate-x-1/2 -translate-y-1/2 opacity-0 group-hover:opacity-100 transition-opacity ${skill.bg}`} />
                                    
                                    <div className="relative z-10">
                                        <div className={`w-12 h-12 rounded-xl flex items-center justify-center mb-4 ${skill.bg} ${skill.color}`}>
                                            <IconComponent className="w-6 h-6" />
                                        </div>
                                        <h3 className="text-lg font-medium text-white mb-1">{skill.name}</h3>
                                        <p className="text-sm text-zinc-500">{skill.category}</p>
                                    </div>
                                </motion.div>
                                );
                            })}
                        </motion.div>
                    </section>
                )}

                {/* Experience Journey */}
                <section id="journey" className="py-24 px-6 max-w-5xl mx-auto w-full relative z-10">
                    <div className="mb-16">
                        <h2 className="text-3xl md:text-4xl font-bold mb-4">Professional Journey</h2>
                        <p className="text-zinc-400 max-w-2xl">
                        A timeline of my professional experience and growth.
                        </p>
                    </div>

                    <div className="space-y-8 relative before:absolute before:inset-0 before:ml-5 before:-translate-x-px md:before:mx-auto md:before:translate-x-0 before:h-full before:w-0.5 before:bg-gradient-to-b before:from-transparent before:via-white/10 before:to-transparent">
                        {experiences?.length > 0 ? experiences.map((exp, index) => (
                            <div key={exp.id} className="relative flex items-center justify-between md:justify-normal md:odd:flex-row-reverse group is-active">
                                <div className="flex items-center justify-center w-10 h-10 rounded-full border-4 border-background bg-brand text-white shadow shrink-0 md:order-1 md:group-odd:-translate-x-1/2 md:group-even:translate-x-1/2 z-10">
                                    <Briefcase className="w-4 h-4" />
                                </div>
                                
                                <div className="w-[calc(100%-4rem)] md:w-[calc(50%-2.5rem)] p-6 rounded-2xl bg-white/[0.02] border border-white/5 backdrop-blur-sm hover:border-brand/30 transition-all">
                                    <div className="flex flex-col sm:flex-row sm:justify-between sm:items-start mb-2 gap-2 sm:gap-0">
                                        <div>
                                            <h3 className="font-bold text-xl text-white">{exp.position}</h3>
                                            <p className="text-brand-light font-medium">{exp.company}</p>
                                        </div>
                                        <span className="px-3 py-1 bg-white/5 border border-white/10 rounded-full text-xs text-zinc-400 whitespace-nowrap">
                                            {new Date(exp.start_date).toLocaleDateString('en-US', { month: 'short', year: 'numeric' })} 
                                            {' - '} 
                                            {exp.is_current ? <span className="text-emerald-400 font-semibold">Present</span> : (exp.end_date ? new Date(exp.end_date).toLocaleDateString('en-US', { month: 'short', year: 'numeric' }) : 'Unknown')}
                                        </span>
                                    </div>
                                    
                                    {exp.description && (
                                        <p className="text-zinc-400 mt-4 whitespace-pre-line text-sm">{exp.description}</p>
                                    )}

                                    {/* Gallery Slider */}
                                    {exp.attachment && Array.isArray(exp.attachment) && exp.attachment.length > 0 && (
                                        <div className="mt-4 flex gap-3 overflow-x-auto pb-2 custom-scrollbar snap-x snap-mandatory">
                                            {exp.attachment.map((img, i) => (
                                                <a href={`/storage/${img}`} target="_blank" rel="noreferrer" key={i} className="snap-center shrink-0 w-48 h-32 rounded-xl overflow-hidden border border-white/10 group relative">
                                                    <img src={`/storage/${img}`} alt="Gallery" className="w-full h-full object-cover hover:scale-110 transition-transform duration-500" loading="lazy" />
                                                </a>
                                            ))}
                                        </div>
                                    )}
                                </div>
                            </div>
                        )) : (
                            <p className="text-zinc-500 italic">No experience added yet.</p>
                        )}
                    </div>
                </section>

                {/* Projects Section */}
                <section id="projects" className="py-24 px-6 max-w-5xl mx-auto w-full relative z-10">
                    <div className="mb-16 flex items-end justify-between">
                        <div>
                            <h2 className="text-3xl md:text-4xl font-bold mb-4">Featured Work</h2>
                            <p className="text-zinc-400 max-w-2xl">
                                A selection of my recent projects showcasing complex logic translated into seamless user experiences.
                            </p>
                        </div>
                        <button className="hidden sm:flex items-center gap-2 text-sm text-brand hover:text-brand-light transition-colors">
                            View all projects <ExternalLink className="w-4 h-4" />
                        </button>
                    </div>

                    <div className="grid grid-cols-1 md:grid-cols-2 gap-8">
                        {projects?.length > 0 ? projects.map((project, i) => (
                            <motion.div 
                                key={project.id}
                                initial={{ opacity: 0, y: 30 }}
                                whileInView={{ opacity: 1, y: 0 }}
                                viewport={{ once: true, margin: "-100px" }}
                                transition={{ duration: 0.6, delay: i * 0.1 }}
                                className={`group relative rounded-3xl overflow-hidden border border-white/10 bg-white/[0.02] ${i === 2 ? 'md:col-span-2' : ''}`}
                            >
                                <AutoSlider images={project.images} onClick={() => setZoomedImage(project.images)} index={i} />
                                
                                <div className="p-8 relative z-20 bg-[#0a0a0a]/80 backdrop-blur-md border-t border-white/5">
                                    <h3 className="text-2xl font-bold mb-3 text-white group-hover:text-brand-light transition-colors">{project.title}</h3>
                                    <p className="text-zinc-400 mb-6 leading-relaxed">
                                        {project.description}
                                    </p>
                                    
                                    <div className="flex items-center justify-between">
                                        <div className="flex flex-wrap gap-2">
                                            {(() => {
                                                let techs = [];
                                                if (Array.isArray(project.technologies)) techs = project.technologies;
                                                else if (typeof project.technologies === 'string') {
                                                    try { techs = JSON.parse(project.technologies); } 
                                                    catch(e) { techs = project.technologies.split(','); }
                                                }
                                                return techs.map((tech, idx) => {
                                                    const TechIcon = getDynamicIcon(tech) || Code2;
                                                    return (
                                                        <div key={idx} title={tech} className="w-8 h-8 flex items-center justify-center rounded-full bg-white/5 border border-white/10 text-zinc-300 hover:bg-white/10 transition-colors">
                                                            <TechIcon className="w-4 h-4" />
                                                        </div>
                                                    );
                                                });
                                            })()}
                                        </div>
                                        
                                        <div className="flex items-center gap-3">
                                            {project.github_url && (
                                                <a href={project.github_url} target="_blank" rel="noopener noreferrer" title="Source Code" className="p-2 rounded-full bg-white/5 hover:bg-white/10 transition-colors">
                                                    <FaGithub className="w-4 h-4" />
                                                </a>
                                            )}
                                            {project.live_url && (
                                                <a href={project.live_url} target="_blank" rel="noopener noreferrer" title="Live Preview" className="p-2 rounded-full bg-brand/10 text-brand hover:bg-brand/20 transition-colors">
                                                    <ExternalLink className="w-4 h-4" />
                                                </a>
                                            )}
                                        </div>
                                    </div>
                                </div>
                            </motion.div>
                        )) : (
                            <p className="text-zinc-500 italic">No projects added yet.</p>
                        )}
                    </div>
                </section>

            </main>

            {/* Lightbox Modal */}
            <AnimatePresence>
                {zoomedImage && (
                    <motion.div 
                        initial={{ opacity: 0 }}
                        animate={{ opacity: 1 }}
                        exit={{ opacity: 0 }}
                        onClick={() => setZoomedImage(null)}
                        className="fixed inset-0 z-[100] bg-black/90 backdrop-blur-sm flex items-center justify-center p-4 md:p-12 cursor-zoom-out"
                    >
                        <button 
                            onClick={() => setZoomedImage(null)}
                            className="absolute top-6 right-6 w-12 h-12 flex items-center justify-center rounded-full bg-white/10 hover:bg-white/20 text-white transition-colors"
                        >
                            <X className="w-6 h-6" />
                        </button>
                        
                        <div 
                            onClick={(e) => e.stopPropagation()} 
                            className="relative w-full max-w-6xl max-h-[85vh] h-full bg-black rounded-xl overflow-hidden shadow-2xl border border-white/10 cursor-default"
                        >
                            <AutoSlider images={zoomedImage} isZoomed={true} />
                        </div>
                    </motion.div>
                )}
            </AnimatePresence>

            <footer className="py-12 mt-12 border-t border-white/10 text-center text-zinc-500">
                <p>© {new Date().getFullYear()} {user?.name}. Portfolio Re-imagined.</p>
            </footer>
        </div>
    );
}
